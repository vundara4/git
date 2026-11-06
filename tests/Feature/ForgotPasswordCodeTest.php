<?php

namespace Tests\Feature;

use App\Mail\PasswordResetCodeMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ForgotPasswordCodeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_request_and_verify_reset_code(): void
    {
        Mail::fake();

        $user = User::factory()->create([
            'email' => 'user@example.com',
        ]);

        $sendResponse = $this->post(route('password.email'), [
            'email' => $user->email,
        ]);

        $sendResponse->assertRedirect();

        $user->refresh();

        $this->assertNotNull($user->reset_code);
        $this->assertNotNull($user->reset_code_expires_at);

        Mail::assertSent(PasswordResetCodeMail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });

        $verifyResponse = $this->post(route('password.verify'), [
            'email' => $user->email,
            'code' => $user->reset_code,
        ]);

        $redirectLocation = $verifyResponse->headers->get('Location');

        $this->assertStringContainsString('/reset-password/', $redirectLocation);
        $this->assertStringContainsString('email=user%40example.com', $redirectLocation);

        $user->refresh();

        $this->assertNull($user->reset_code);
        $this->assertNull($user->reset_code_expires_at);
    }
}
