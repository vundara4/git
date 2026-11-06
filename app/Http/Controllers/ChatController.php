<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use App\Models\Product;

class ChatController extends Controller
{
    public function respond(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $userMessage = Str::lower($validated['message']);
        $reply = $this->generateResponse($userMessage);

        return response()->json([
            'status' => 'success',
            'reply' => $reply,
        ]);
    }

    private function generateResponse(string $input): string
    {
        $product = Product::query()->get()->first(function (Product $product) use ($input) {
            return Str::contains($input, Str::lower($product->ProductName));
        });

        if ($product) {
            if (Str::contains($input, ['price', 'cost', 'how much'])) {
                return "{$product->ProductName} costs $" . number_format((float) $product->Price, 2) . '.';
            }

            if (Str::contains($input, ['stock', 'available', 'availability'])) {
                return $product->stock > 0
                    ? "Yes, {$product->ProductName} is available. We have {$product->stock} in stock."
                    : "Sorry, {$product->ProductName} is currently out of stock.";
            }

            return "{$product->ProductName} is available for $" . number_format((float) $product->Price, 2) . '. Would you like help adding it to your cart?';
        }

        return match (true) {
            Str::contains($input, ['delivery', 'time', 'fast', 'arrive', 'location', 'phnom penh']) => 
                "We currently deliver in Phnom Penh. Please tell us your area so we can confirm availability and estimate delivery time.",

            Str::contains($input, ['burger', 'food', 'menu', 'product', 'item', 'category']) => 
                "You can explore all available meals by clicking 'Browse Categories' in the top banner section.",

            Str::contains($input, ['price', 'discount', 'deal', 'promo', 'offer', 'hot']) => 
                "Check out our 'HOT DEALS' collection on the main dashboard for current promotions!",

            Str::contains($input, ['login', 'account', 'sign in', 'register']) => 
                "You can access your account details or register by clicking the 'Login' button at the top right.",

            Str::contains($input, ['cart', 'checkout', 'buy']) => 
                "Add your items to the basket and select the 'Cart' button on the header to complete your order.",

            default => "Thanks for reaching out! A support representative will review your message shortly."
        };
    }
}