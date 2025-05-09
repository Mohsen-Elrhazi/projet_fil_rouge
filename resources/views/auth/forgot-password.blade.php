<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <!-- component -->
    <div
        class="bg-blue-900 absolute top-0 left-0 bg-gradient-to-b from-gray-900 via-gray-900 to-blue-800 bottom-0 leading-5 h-full w-full overflow-hidden">
    </div>
    <div class="relative   min-h-screen  sm:flex sm:flex-row  justify-center bg-transparent rounded-3xl shadow-xl">
        <div class="flex-col flex  self-center lg:px-14 sm:max-w-4xl xl:max-w-md  z-10">
            <div class="self-start hidden lg:flex flex-col  text-gray-300">

                <h1 class="my-3 font-semibold text-4xl">Reset Password</h1>
                <p class="pr-3 text-base opacity-75">Enter your email address and we'll send you a link to reset your
                    password.</p>
            </div>
        </div>
        <div class="flex justify-center self-center  z-10">
            <div class="p-12 bg-white mx-auto rounded-3xl w-112 ">
                <div class="mb-7">
                    <h3 class="font-semibold text-2xl text-gray-800">Forgot Password</h3>
                    <p class="text-gray-500">Remember your password? <a href="{{ route('login') }}"
                            class="text-sm text-blue-900 hover:text-blue-900">Sign In</a></p>
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="space-y-6">
                        <div class="h-14">
                            <input type="email" placeholder="Email Address" name="email"
                                class="{{ $errors->has('email') ? 'border-red-500 ' : '' }} w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-purple-400">
                            @error('email')
                            <span class="text-red-500 text-sm ps-4">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center bg-[#334155]  hover:bg-[#253750] text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
                                Send Reset Link
                            </button>
                        </div>
                </form>
                <!-- social log -->
            </div>
            <div class="mt-7 text-center text-gray-500 text-sm">
                <span>
                    Copyright © 2025
                    <a href="https://codepen.io/uidesignhub" rel="" target="_blank" title="Codepen aji"
                        class="#">Lightning</a>
                </span>
            </div>
        </div>
    </div>
    </div>
    </div>
    <footer class="bg-transparent absolute w-full bottom-0 left-0 z-30">
        <div class="container p-5 mx-auto  flex items-center justify-between ">
            <div class="flex mr-auto">
                <p class="text-xl"><strong>Lightning</strong></p>
                </a>
            </div>

        </div>
    </footer>

    <svg class="absolute bottom-0 left-0 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1"
            d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
    </svg>
    <script src="{{ asset('js/auth/auth.js') }}"></script>

</body>

</html>