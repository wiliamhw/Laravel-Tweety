<x-app>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="border border-gray-800 border-y-0 text-white font-sans mb-5">
            <!-- Profile Banner -->
            <div id="profile_banner_output" class="relative w-full bg-cover bg-no-repeat bg-center"
                 style="height: 200px;background-image: url({{ $user->profile_banner }});">
                <div class="absolute left-0 right-0 top-0 bottom-0 flex justify-center items-center"
                     style="background-color: rgba(0, 0, 0, 0.3)">

                    <label for="profile_banner"
                           class="cursor-pointer h-11 w-11 rounded-full p-2 hover:bg-white hover:bg-opacity-25">
                        <svg viewBox="0 0 24 24" fill="white">
                            <g>
                                <path
                                    d="M19.708 22H4.292C3.028 22 2 20.972 2 19.708V7.375C2 6.11 3.028 5.083 4.292 5.083h2.146C7.633 3.17 9.722 2 12 2c2.277 0 4.367 1.17 5.562 3.083h2.146C20.972 5.083 22 6.11 22 7.375v12.333C22 20.972 20.972 22 19.708 22zM4.292 6.583c-.437 0-.792.355-.792.792v12.333c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V7.375c0-.437-.355-.792-.792-.792h-2.45c-.317.05-.632-.095-.782-.382-.88-1.665-2.594-2.7-4.476-2.7-1.883 0-3.598 1.035-4.476 2.702-.16.302-.502.46-.833.38H4.293z"></path>
                                <path
                                    d="M12 8.167c-2.68 0-4.86 2.18-4.86 4.86s2.18 4.86 4.86 4.86 4.86-2.18 4.86-4.86-2.18-4.86-4.86-4.86zm2 5.583h-1.25V15c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-1.25H10c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.25V11c0-.414.336-.75.75-.75s.75.336.75.75v1.25H14c.414 0 .75.336.75.75s-.336.75-.75.75z">
                                </path>
                            </g>
                        </svg>
                    </label>
                    <input onchange="displayChange('profile_banner', 'profile_banner_output', 'profile_banner_button')"
                        id="profile_banner" name="profile_banner" accept="image/*" type="file" class="hidden"/>

                    <!-- Cancel button -->
                    <div onclick="rollBackChange('profile_banner', 'profile_banner_output', 'profile_banner_button')"
                         id="profile_banner_button"
                         class="hidden ml-8 cursor-pointer h-11 w-11 rounded-full p-2 hover:bg-white hover:bg-opacity-25">
                        <svg viewBox="0 0 24 24" fill="white">
                            <g>
                                <path
                                    d="M13.414 12l5.793-5.793c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0L12 10.586 6.207 4.793c-.39-.39-1.023-.39-1.414 0s-.39 1.023 0 1.414L10.586 12l-5.793 5.793c-.39.39-.39 1.023 0 1.414.195.195.45.293.707.293s.512-.098.707-.293L12 13.414l5.793 5.793c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L13.414 12z">
                                </path>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <div class="relative flex w-full">
                    <!-- Avatar -->
                    <div class="flex flex-1">
                        <div style="margin-top: -6rem">
                            <div style="height: 9rem;width: 9rem;" class="relative rounded-full avatar">
                                <img id="avatar_output" style="height: 9rem;width: 9rem;"
                                     class="rounded-full relative border-4 border-gray-900 object-cover"
                                     src="{{ $user->avatar }}"
                                     alt=""
                                />
                                <div class="absolute rounded-full left-0 right-0 top-0 bottom-0 flex justify-center items-center"
                                     style="background-color: rgba(0, 0, 0, 0.3)">

                                    <label for="avatar"
                                           class="h-11 w-11 cursor-pointer rounded-full p-2 hover:bg-white hover:bg-opacity-25">
                                        <svg viewBox="0 0 24 24" fill="white">
                                            <g>
                                                <path
                                                    d="M19.708 22H4.292C3.028 22 2 20.972 2 19.708V7.375C2 6.11 3.028 5.083 4.292 5.083h2.146C7.633 3.17 9.722 2 12 2c2.277 0 4.367 1.17 5.562 3.083h2.146C20.972 5.083 22 6.11 22 7.375v12.333C22 20.972 20.972 22 19.708 22zM4.292 6.583c-.437 0-.792.355-.792.792v12.333c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V7.375c0-.437-.355-.792-.792-.792h-2.45c-.317.05-.632-.095-.782-.382-.88-1.665-2.594-2.7-4.476-2.7-1.883 0-3.598 1.035-4.476 2.702-.16.302-.502.46-.833.38H4.293z"></path>
                                                <path
                                                    d="M12 8.167c-2.68 0-4.86 2.18-4.86 4.86s2.18 4.86 4.86 4.86 4.86-2.18 4.86-4.86-2.18-4.86-4.86-4.86zm2 5.583h-1.25V15c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-1.25H10c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.25V11c0-.414.336-.75.75-.75s.75.336.75.75v1.25H14c.414 0 .75.336.75.75s-.336.75-.75.75z">
                                                </path>
                                            </g>
                                        </svg>
                                    </label>
                                    <input onchange="displayChange('avatar', 'avatar_output', null, false)"
                                        id="avatar" name="avatar" accept="image/*" type="file" class="hidden"/>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Name section -->
            <div class="flex-col px-4 py-3 bg-transparent">
                <div id="name-div" class="border border-gray-700 border-4 border-2 rounded-md">
                    <div class="m-3">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-400" for="name">Name</label>
                        <input class="bg-transparent outline-none w-full"
                               type="text"
                               name="name"
                               id="name"
                               onfocusin="changeBorder('name-div', 'in')"
                               onfocusout="changeBorder('name-div', 'out')"
                               autocomplete="off"
                               value="{{ $user->name }}"
                               required
                        >
                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Username section -->
            <div class="flex-col px-4 py-3 bg-transparent">
                <div id="username-div" class="border border-gray-700 border-4 border-2 rounded-md">
                    <div class="m-3">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-400" for="username">Username</label>

                        <input class="bg-transparent outline-none w-full"
                               type="text"
                               name="username"
                               id="username"
                               onfocusin="changeBorder('username-div', 'in')"
                               onfocusout="changeBorder('username-div', 'out')"
                               autocomplete="off"
                               value="{{ $user->username }}"
                               required
                        >
                        @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Profile text section -->
            <div class="flex-col px-4 py-3 bg-transparent">
                <div id="profile_text-div" class="border border-gray-700 border-4 border-2 rounded-md">
                    <div class="m-3">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-400" for="profile_text">Profile Text</label>
                        <textarea class="bg-transparent outline-none w-full leading-5"
                                type="text" id="profile_text" name="profile_text"
                                onfocusin="changeBorder('profile_text-div', 'in')"
                                onfocusout="changeBorder('profile_text-div', 'out')"
                                autocomplete="off" spellcheck="false"
                                oninput="resize(this)"
                        >{{ $user->profile_text }}</textarea>
                        <script>resize()</script>
                        @error('profile_text')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Email section -->
            <div class="flex-col px-4 py-3 bg-transparent">
                <div id="email-div" class="border border-gray-700 border-4 border-2 rounded-md">
                    <div class="m-3">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-400" for="email">Email</label>

                        <input class="bg-transparent outline-none w-full"
                               type="text"
                               name="email"
                               id="email"
                               onfocusin="changeBorder('email-div', 'in')"
                               onfocusout="changeBorder('email-div', 'out')"
                               autocomplete="off"
                               value="{{ $user->email }}"
                               required
                        >
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- New Password section -->
            <div class="flex-col px-4 py-3 bg-transparent">
                <div id="password-div" class="border border-gray-700 border-4 border-2 rounded-md">
                    <div class="m-3">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-400" for="password">New Password</label>

                        <input class="bg-transparent outline-none w-full"
                               type="password"
                               name="password"
                               id="password"
                               onfocusin="changeBorder('password-div', 'in')"
                               onfocusout="changeBorder('password-div', 'out')"
                               autocomplete="off"
                        >
                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Confirm New password section -->
            <div class="flex-col px-4 py-3 bg-transparent">
                <div id="password_confirmation-div" class="border border-gray-700 border-4 border-2 rounded-md">
                    <div class="m-3">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-400" for="password_confirmation">
                            New Password Confirmation
                        </label>

                        <input class="bg-transparent outline-none w-full"
                               type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               onfocusin="changeBorder('password_confirmation-div', 'in')"
                               onfocusout="changeBorder('password_confirmation-div', 'out')"
                               autocomplete="off"
                        >
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Button section -->
            <div class="px-4 py-3 pb-6 flex justify-end align-middle">
                <div class="self-center">
                    <a href="{{ $user->path() }}" class="hover:underline text-white">Cancel</a>
                </div>
                <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 ml-4 rounded-full font-bold"
                >
                    Submit
                </button>
            </div>
        </div>
    </form>
</x-app>
