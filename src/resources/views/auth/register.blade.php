<x-layout>

    <x-slot:heading> Register </x-slot:heading>
    <div class="rounded-lg bg-white px-6 py-6">
        <div class="flex flex-col">
            <div class="flex-1">
                <div class="grid justify-items-center pointer-events-none">
                    <img class="w-[180px]" src="{{ Vite::asset('resources/images/workspace-logo.png') }}" alt="">
                </div>
            </div>
            <div class="mt-3">
                <form action="/register" method="POST" class="flex flex-col space-y-3">
                    @csrf
                    <label for=""></label>
                    <div>
                        <input placeholder="Username" class="w-96 p-2 border-2 rounded-lg border-black text-md"
                            type="text" name="username" id="username" required>
                        @error('username')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input placeholder="email" class="w-96 p-2 border-2 rounded-lg border-black text-md"
                            type="email" name="email" id="email" required :value="old('email')">
                        @error('email')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input placeholder="Password" class="w-96 p-2 border-2 rounded-lg border-black" type="password"
                            name="password" id="password" required>
                        @error('password')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input placeholder="password confirmation" class="w-96 p-2 border-2 rounded-lg border-black"
                            type="password" name="password_confirmation" id="password_confirmation" required>
                        @error('password_confirmation')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input placeholder="company code" class="w-96 p-2 border-2 rounded-lg border-black text-md"
                            type="text" name="company_code" id="company_code" required>
                        @error('company_code')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1 w-full">
                        <x-submit-button type="submit"
                            class="text-center w-full bg-slate-950 hover:bg-transparent border-2 border-slate-950 hover:border-slate-950 hover:text-black">
                            Register
                        </x-submit-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
