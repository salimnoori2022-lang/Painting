<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Thanks for registering. Before continuing, please verify your email address
        by clicking the link we sent to your email.
    </div>

    @if (session('status') === 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-600">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <button type="submit"
            class="rounded bg-gray-800 px-4 py-2 text-white">
            Resend Verification Email
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf

        <button type="submit" class="text-sm text-gray-600 underline">
            Log Out
        </button>
    </form>
</x-guest-layout>