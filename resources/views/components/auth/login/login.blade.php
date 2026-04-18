<section class="min-h-screen bg-slate-100 flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-md rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xl shadow-slate-900/5">
        <div class="text-center">
            <h1 class="text-2xl font-semibold text-slate-900">Welcome Back</h1>
            <p class="mt-1 text-sm text-slate-500">Sign in to continue</p>
        </div>

        <form wire:submit="login" class="mt-6 space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input
                    id="email"
                    type="email"
                    wire:model.defer="email"
                    autocomplete="email"
                    class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                    placeholder="you@example.com"
                >
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                <input
                    id="password"
                    type="password"
                    wire:model.defer="password"
                    autocomplete="current-password"
                    class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                    placeholder="Enter your password"
                >
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                <input
                    type="checkbox"
                    wire:model="remember"
                    class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                >
                <span>Remember me</span>
            </label>

            <button
                type="submit"
                class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-300 disabled:opacity-60"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove wire:target="login">Login</span>
                <span wire:loading wire:target="login">Signing in...</span>
            </button>
        </form>
    </div>
</section>