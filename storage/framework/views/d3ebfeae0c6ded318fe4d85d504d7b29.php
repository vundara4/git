<div id="chat-widget-container">
    <!-- Floating Action Button -->
    <button id="chat-toggle-btn" type="button" aria-label="Open chat">
        💬
    </button>

    <!-- Chat Modal Window -->
    <div id="chat-window" class="chat-hidden">
        <div class="chat-header">
            <div class="header-info">
                <span class="status-indicator"></span>
                <strong>Romdul Support</strong>
            </div>
            <button type="button" id="chat-close-btn" aria-label="Close chat">&times;</button>
        </div>

        <div id="chat-messages" class="chat-body">
            <div class="message bot">
                Hello! 👋 Welcome to Romdul Delivery. How can we help you with your order or food selection today?
            </div>
        </div>

        <div class="chat-footer">
            <input 
                type="text" 
                id="chat-input" 
                placeholder="Ask about items, delivery, deals..." 
                autocomplete="off"
            />
            <button type="button" id="chat-send-btn">Send</button>
        </div>
    </div>
</div>

<style>
    #chat-widget-container {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 9999;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    #chat-toggle-btn {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background-color: #4f46e5;
        color: #ffffff;
        border: none;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(79, 70, 229, 0.4);
        transition: transform 0.2s ease, background-color 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #chat-toggle-btn:hover {
        transform: scale(1.05);
        background-color: #4338ca;
    }

    #chat-window {
        position: absolute;
        bottom: 70px;
        right: 0;
        width: min(350px, calc(100vw - 32px));
        height: 440px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        transition: all 0.2s ease-in-out;
    }

    .chat-hidden {
        display: none !important;
    }

    .chat-header {
        background: #4f46e5;
        color: #ffffff;
        padding: 14px 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-info {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .status-indicator {
        width: 8px;
        height: 8px;
        background-color: #22c55e;
        border-radius: 50%;
    }

    #chat-close-btn {
        background: none;
        border: none;
        color: #ffffff;
        font-size: 20px;
        cursor: pointer;
        line-height: 1;
    }

    .chat-body {
        flex: 1;
        padding: 14px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
        background-color: #f9fafb;
    }

    .message {
        max-width: 82%;
        padding: 10px 14px;
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.4;
        word-break: break-word;
    }

    .message.bot {
        background-color: #ffffff;
        color: #1f2937;
        align-self: flex-start;
        border: 1px solid #e5e7eb;
        border-bottom-left-radius: 2px;
    }

    .message.user {
        background-color: #4f46e5;
        color: #ffffff;
        align-self: flex-end;
        border-bottom-right-radius: 2px;
    }

    .chat-footer {
        display: flex;
        padding: 10px;
        background: #ffffff;
        border-top: 1px solid #e5e7eb;
        gap: 8px;
    }

    .chat-footer input {
        flex: 1;
        padding: 9px 12px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        outline: none;
        font-size: 14px;
    }

    .chat-footer input:focus {
        border-color: #4f46e5;
    }

    .chat-footer button {
        padding: 9px 16px;
        background: #4f46e5;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
    }

    .chat-footer button:hover {
        background: #4338ca;
    }

    @media (max-width: 480px) {
        #chat-widget-container {
            right: 16px;
            bottom: 105px;
        }

        #chat-toggle-btn {
            width: 36px;
            height: 36px;
            font-size: 16px;
        }

        #chat-window {
            bottom: 48px;
            height: min(440px, calc(100vh - 100px));
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('chat-toggle-btn');
        const closeBtn = document.getElementById('chat-close-btn');
        const chatWindow = document.getElementById('chat-window');
        const sendBtn = document.getElementById('chat-send-btn');
        const inputField = document.getElementById('chat-input');
        const messagesContainer = document.getElementById('chat-messages');

        const toggleChat = () => chatWindow.classList.toggle('chat-hidden');
        toggleBtn.addEventListener('click', toggleChat);
        closeBtn.addEventListener('click', toggleChat);

        const processSendMessage = async () => {
            const query = inputField.value.trim();
            if (!query) return;

            appendMessage(query, 'user');
            inputField.value = '';

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                const response = await fetch("<?php echo e(route('chat.respond')); ?>", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken || ''
                    },
                    body: JSON.stringify({ message: query })
                });

                const data = await response.json();
                appendMessage(data.reply, 'bot');
            } catch (error) {
                appendMessage("Sorry, I'm having trouble connecting to the server right now.", 'bot');
            }
        };

        sendBtn.addEventListener('click', processSendMessage);
        inputField.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') processSendMessage();
        });

        function appendMessage(text, sender) {
            const msgNode = document.createElement('div');
            msgNode.classList.add('message', sender);
            msgNode.textContent = text;
            messagesContainer.appendChild(msgNode);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
    });
</script><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/components/chat-widget.blade.php ENDPATH**/ ?>