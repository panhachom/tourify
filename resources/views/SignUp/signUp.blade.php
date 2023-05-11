<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/6fa5d10da9.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')


    <title>Sign Up</title>
</head>
<body class="h-screen ">
        <div class="container-center     h-6/12 pe-40 m-2 item-center">
            <div class="g-6 flex h-full flex-wrap items-center justify-center w-full rounded-b-lg ">
                <!-- Left column container with background-->
                <div class="ml-16 md:w-6/12 lg:w-6/12 bg-primary w-full h-full ">
                    <img
                      src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                      class="w-full h-full "
                      alt="Phone image" />
                </div>
                <!-- Right column container with form -->
                <div class="md:w-8/12 lg:ml-6 lg:w-5/12">

                    <form>
                        <h1 class="mt-14 pb-1 text-xl font-semibold text-center">
                            Sign Up here
                        </h1>
                        <div class="flex space-x-24 mt-4">

                        <!-- name input -->
                            <div class="relative mb-4" data-te-input-wrapper-init>
                                <div>
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-600">First Name</label>
                                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John" required>
                                </div>
                            </div>

                        <!-- last name input -->
                            <div class="relative mb-4" data-te-input-wrapper-init>
                                <div>
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-600">Last Name</label>
                                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John" required>
                                </div>
                            </div>
                        </div>

                        <div class="relative mb-4" data-te-input-wrapper-init>
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-600">Email or Phone number</label>
                                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Email or Phone number" required>
                            </div>
                        </div>

                        <div class="relative mb-4" data-te-input-wrapper-init>
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Password" required>
                            </div>
                        </div>
                        <div class="relative mb-4" data-te-input-wrapper-init>
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-600">Confirm Password</label>
                                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <!-- Remember me checkbox -->
                        <div class="mb-4 flex items-center justify-between">
            </div>

              <!-- Submit button -->
              <button
                type="submit"
                class="inline-block w-full rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-ripple-init
                data-te-ripple-color="light">
                Submit
              </button>

              <!-- Divider -->
    <!-- Social login buttons -->

    </form>
    <p class="text-sm font-light text-gray-500 dark:text-gray-400 m-6 text-center">
        Already have account? <a href="#" class="font-medium text-primary hover:underline dark:text-primary-500">Sign in here</a>
                                </p>
                            </div>
                        </div>
        </div>
</body>
</html>

