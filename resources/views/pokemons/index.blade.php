<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite('resources/css/app.css')

</head>
<body class="antialiased">
<div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/home') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            @else
                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="w-4/5 mx-auto p-6 lg:p-8">

        <div class="bg-white">
            <div>
                <h1 class="pt-8 text-center text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl ">Choose your Pokemon</h1>
            </div>

            <div>
                @if($errors)
                    @foreach($errors->all() as $error)
                        <p style="color: red;">{{$error}}</p>
                    @endforeach
                @endif
            </div>
            <div class="flex justify-center mx-auto max-w-2xl px-4 py-4 sm:px-6 sm:py-8 lg:max-w-7xl lg:px-8">
                <form class="w-full flex flex-col justify-center" action="{{route("pokemons.store")}}" method="post">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6 justify-evenly">
                        <fieldset>
                            <legend class="flex items-center mb-4">Gender</legend>

                            <div class="flex items-center mb-4">
                                <input id="country-option-1" type="radio" name="gender" value="male"
                                       class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                                       checked>
                                <label for="country-option-1"
                                       class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Male
                                </label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="country-option-2" type="radio" name="gender" value="female"
                                       class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="country-option-2"
                                       class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Female
                                </label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="country-option-3" type="radio" name="gender" value="genderless"
                                       class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="country-option-3"
                                       class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Genderless
                                </label>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="flex items-center mb-4">Growth rate</legend>

                            <div class="flex items-center mb-4">
                                <input id="country-option-1" type="radio" name="growth_rate" value="slow"
                                       class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                                       checked>
                                <label for="country-option-1"
                                       class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Slow
                                </label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="country-option-2" type="radio" name="growth_rate" value="medium"
                                       class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="country-option-2"
                                       class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Medium
                                </label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="country-option-3" type="radio" name="growth_rate" value="fast"
                                       class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="country-option-3"
                                       class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Fast
                                </label>
                            </div>
                        </fieldset>
                        <div class="">
                            <div class="">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="nature">
                                    Nature
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        name="nature" id="nature">
                                        <option selected value="">Choose nature</option>
                                        <option value="hardy">Hardy</option>
                                        <option value="calm">Calm</option>
                                        <option value="docile">Docile</option>
                                        <option value="rash">Rash</option>
                                        <option value="quirky">Quirky</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="color">
                                    Color
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        name="color" id="color">
                                        <option selected value="">Choose color</option>
                                        <option value="black">Black</option>
                                        <option value="blue">Blue</option>
                                        <option value="brown">Brown</option>
                                        <option value="gray">Gray</option>
                                        <option value="green">Green</option>
                                        <option value="pink">Pink</option>
                                        <option value="purple">Purple</option>
                                        <option value="red">Red</option>
                                        <option value="white">White</option>
                                        <option value="yellow">Yellow</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="w-80 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>


                </form>
            </div>

            @if(isset($idealPokemons))
                <div class="mx-auto max-w-2xl px-4 sm:px-6 sm:pt-4 sm:pb-24 lg:max-w-7xl lg:px-8">
                    <h2 class="pb-8 text-center text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl ">Your ideal option</h2>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach($idealPokemons as $pokemon)
                            <a href="#" class="group">
                                <div
                                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                    <img src="{{$pokemon['img']}}"
                                         alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                         class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                                <h3 class="mt-4 text-gray-700 font-bold">{{$pokemon['name']}}</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900"></p>

                                <div class="flex mt-2">
                                    <div>
                                        <svg height="24px" width="24px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 511.983 511.983" xml:space="preserve" fill="#000000"><g
                                                id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path style="fill:#967ADC;"
                                                      d="M444.879,3.117c-4.171-4.156-10.921-4.156-15.093,0l0,0L355.789,77.13l15.077,15.078l73.997-73.998 h0.016C449.035,14.039,449.035,7.289,444.879,3.117z"></path>
                                                <path style="fill:#AC92EB;"
                                                      d="M444.863,48.366L444.863,48.366L444.863,48.366L444.863,48.366L444.863,48.366L399.646,3.149 c0,0,0-0.016-0.016-0.016c-4.156-4.156-10.906-4.156-15.077,0c-4.172,4.171-4.172,10.921,0,15.093l0,0l45.217,45.202 c0,0.016,0,0.016,0,0.016c4.172,4.171,10.922,4.171,15.093,0C449.02,59.287,449.02,52.522,444.863,48.366z"></path>
                                                <path style="fill:#D770AD;"
                                                      d="M170.654,396.659v104.669c0,5.89,4.766,10.655,10.656,10.655s10.671-4.766,10.671-10.655V396.659 H170.654z"></path>
                                                <g>
                                                    <path style="fill:#EC87C0;"
                                                          d="M181.311,170.659c-64.795,0-117.324,52.529-117.324,117.332c0,64.81,52.529,117.339,117.324,117.339 c64.81,0,117.34-52.529,117.34-117.339C298.65,223.188,246.12,170.659,181.311,170.659z M249.199,355.879 c-18.14,18.125-42.249,28.109-67.888,28.109c-25.64,0-49.749-9.984-67.873-28.109c-18.14-18.14-28.124-42.248-28.124-67.888 c0-25.647,9.984-49.756,28.124-67.881c18.125-18.14,42.233-28.124,67.873-28.124s49.748,9.984,67.888,28.124 c18.125,18.125,28.108,42.233,28.108,67.881C277.306,313.631,267.323,337.739,249.199,355.879z"></path>
                                                    <path style="fill:#EC87C0;"
                                                          d="M213.294,479.984h-63.951c-5.891,0-10.672-4.766-10.672-10.656s4.781-10.671,10.672-10.671h63.951 c5.891,0,10.672,4.78,10.672,10.671S219.184,479.984,213.294,479.984z"></path>
                                                </g>
                                                <path style="fill:#AC92EB;"
                                                      d="M369.429,78.537c-22.906-22.905-52.937-34.358-82.967-34.358s-60.061,11.453-82.966,34.358 c-45.811,45.826-45.811,120.121,0,165.932c20.468,20.469,46.608,31.788,73.356,33.976c-0.75-7.57-2.375-14.944-4.828-22.007 c-20.155-3.031-38.764-12.359-53.435-27.046c-18.14-18.141-28.124-42.233-28.124-67.889c0-25.64,9.984-49.748,28.124-67.873 c18.125-18.125,42.233-28.125,67.873-28.125c25.641,0,49.748,10,67.873,28.125c18.14,18.125,28.124,42.233,28.124,67.873 c0,25.655-9.984,49.748-28.108,67.889c-16.219,16.202-37.218,25.905-59.811,27.78c1.859,6.797,3.109,13.843,3.703,21.085 c25.983-2.609,51.279-13.866,71.186-33.788C415.24,198.658,415.24,124.363,369.429,78.537z"></path>
                                            </g></svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['gender']}}</div>
                                </div>
                                <div class="flex mt-2">
                                    <div>
                                        <svg height="24px" width="24px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 503.467 503.467" xml:space="preserve" fill="#000000"><g
                                                id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g transform="translate(1 1)">
                                                    <path style="fill:#80D6FA;"
                                                          d="M139.8,498.2H191V327.533h-51.2V498.2z M311.32,498.2h50.347V344.6H311.32V498.2z M395.8,498.2H447 V225.133h-51.2V498.2z M225.133,498.2h51.2V293.4h-51.2V498.2z M54.467,498.2h51.2V395.8h-51.2V498.2z"></path>
                                                    <path style="fill:#FFD0A1;"
                                                          d="M250.733,54.467c14.507,0,25.6,11.093,25.6,25.6c0,6.827-2.56,13.653-7.68,17.92 c-4.267,4.267-11.093,7.68-17.92,7.68c-14.507,0-25.6-11.093-25.6-25.6S236.227,54.467,250.733,54.467z M353.987,147.48 c4.267,4.267,7.68,11.093,7.68,17.92c0,14.507-11.093,25.6-25.6,25.6s-25.6-11.093-25.6-25.6c0-6.827,2.56-13.653,7.68-17.92 c4.267-4.267,11.093-7.68,17.92-7.68S349.72,142.36,353.987,147.48z M472.6,3.267c14.507,0,25.6,11.093,25.6,25.6 s-11.093,25.6-25.6,25.6c-6.827,0-13.653-2.56-17.92-7.68c-4.267-4.267-7.68-11.093-7.68-17.92 C447,14.36,458.093,3.267,472.6,3.267z M28.867,259.267c14.507,0,25.6,11.093,25.6,25.6s-11.093,25.6-25.6,25.6 s-25.6-11.093-25.6-25.6S14.36,259.267,28.867,259.267z"></path>
                                                </g>
                                                <path style="fill:#51565F;"
                                                      d="M499.2,503.467H4.267C1.707,503.467,0,501.76,0,499.2c0-2.56,1.707-4.267,4.267-4.267H51.2V396.8 c0-2.56,1.707-4.267,4.267-4.267h51.2c2.56,0,4.267,1.707,4.267,4.267v98.133h25.6v-166.4c0-2.56,1.707-4.267,4.267-4.267H192 c2.56,0,4.267,1.707,4.267,4.267v166.4h25.6V294.4c0-2.56,1.707-4.267,4.267-4.267h51.2c2.56,0,4.267,1.707,4.267,4.267v200.533 h26.453V345.6c0-2.56,1.707-4.267,4.267-4.267h50.347c2.56,0,4.267,1.707,4.267,4.267v149.333h25.6v-268.8 c0-2.56,1.707-4.267,4.267-4.267H448c2.56,0,4.267,1.707,4.267,4.267v268.8H499.2c2.56,0,4.267,1.707,4.267,4.267 C503.467,501.76,501.76,503.467,499.2,503.467z M401.067,494.934h42.667V230.4h-42.667V494.934z M316.587,494.934H358.4V349.867 h-41.813V494.934z M230.4,494.934h42.667V298.667H230.4V494.934z M145.067,494.934h42.667V332.8h-42.667V494.934z M59.733,494.934 H102.4v-93.867H59.733V494.934z M29.867,315.733C13.653,315.733,0,302.08,0,285.867S13.653,256,29.867,256 c8.533,0,17.067,4.267,22.187,10.24L224.427,93.867c-1.707-3.413-2.56-7.68-2.56-12.8c0-16.213,13.653-29.867,29.867-29.867 S281.6,64.854,281.6,81.067c0,6.827-2.56,12.8-5.973,17.92l43.52,43.52c5.12-3.413,11.093-5.973,17.92-5.973s12.8,2.56,17.92,5.973 l94.72-94.72c-3.413-5.12-5.973-11.093-5.973-17.92C443.734,13.654,457.387,0,473.6,0s29.867,13.653,29.867,29.867 S489.814,59.733,473.6,59.733c-6.827,0-12.8-2.56-17.92-5.973l-94.72,94.72c3.413,5.12,5.973,11.093,5.973,17.92 c0,16.213-13.653,29.867-29.867,29.867c-16.213,0-29.867-13.653-29.867-29.867c0-6.827,2.56-12.8,5.973-17.92l-43.52-43.52 c-5.12,3.413-11.093,5.973-17.92,5.973c-8.533,0-17.067-4.267-22.187-10.24L57.173,273.067c1.707,3.413,2.56,7.68,2.56,12.8 C59.733,302.08,46.08,315.733,29.867,315.733z M29.867,264.533c-11.947,0-21.333,9.387-21.333,21.333 c0,11.947,9.387,21.333,21.333,21.333S51.2,297.813,51.2,285.867C51.2,273.92,41.813,264.533,29.867,264.533z M337.067,145.067 c-11.947,0-21.333,9.387-21.333,21.333c0,11.947,9.387,21.333,21.333,21.333S358.4,178.347,358.4,166.4 C358.4,154.454,349.013,145.067,337.067,145.067z M251.733,59.733c-11.947,0-21.333,9.387-21.333,21.333s9.387,21.333,21.333,21.333 c11.947,0,21.333-9.387,21.333-21.333S263.68,59.733,251.733,59.733z M459.093,45.227c3.413,3.413,9.387,5.973,14.507,5.973 c11.947,0,21.333-9.387,21.333-21.333S485.547,8.533,473.6,8.533c-11.947,0-21.333,9.387-21.333,21.333 C452.267,35.84,454.827,40.96,459.093,45.227C458.24,44.374,458.24,44.374,459.093,45.227L459.093,45.227z"></path>
                                            </g></svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['growth_rate']}}</div>
                                </div>
                                <div class="flex mt-2">
                                    <div>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M2 9V6.5C2 4.01 4.01 2 6.5 2H9" stroke="#292D32" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15 2H17.5C19.99 2 22 4.01 22 6.5V9" stroke="#292D32"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path d="M22 16V17.5C22 19.99 19.99 22 17.5 22H16" stroke="#292D32"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path d="M9 22H6.5C4.01 22 2 19.99 2 17.5V15" stroke="#292D32"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path opacity="0.4"
                                                      d="M8.5 11C9.88071 11 11 9.88071 11 8.5C11 7.11929 9.88071 6 8.5 6C7.11929 6 6 7.11929 6 8.5C6 9.88071 7.11929 11 8.5 11Z"
                                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path opacity="0.4"
                                                      d="M7.5 18C8.32843 18 9 17.3284 9 16.5C9 15.6716 8.32843 15 7.5 15C6.67157 15 6 15.6716 6 16.5C6 17.3284 6.67157 18 7.5 18Z"
                                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path opacity="0.4"
                                                      d="M16.5 9C17.3284 9 18 8.32843 18 7.5C18 6.67157 17.3284 6 16.5 6C15.6716 6 15 6.67157 15 7.5C15 8.32843 15.6716 9 16.5 9Z"
                                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path opacity="0.4"
                                                      d="M15.5 18C16.8807 18 18 16.8807 18 15.5C18 14.1193 16.8807 13 15.5 13C14.1193 13 13 14.1193 13 15.5C13 16.8807 14.1193 18 15.5 18Z"
                                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['nature']}}</div>
                                </div>
                                <div class="flex mt-2">
                                    <div>
                                        <svg height="24px" width="24px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g
                                                id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path style="fill:#D8D8DA;"
                                                      d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,336.842c-44.648,0-80.842-36.194-80.842-80.842s36.194-80.842,80.842-80.842s80.842,36.194,80.842,80.842 S300.648,336.842,256,336.842z"></path>
                                                <path style="fill:#D4B6E6;"
                                                      d="M282.947,188.632h220.076C485.09,122.726,441.507,67.394,383.64,34.044L229.053,188.632H282.947z"></path>
                                                <path style="fill:#EBAFD1;"
                                                      d="M229.053,188.632L383.639,34.044C346.068,12.39,302.482,0,256,0c-23.319,0-45.899,3.135-67.368,8.978 v220.075L229.053,188.632z"></path>
                                                <path style="fill:#E07188;"
                                                      d="M188.632,229.053V8.978C122.726,26.91,67.394,70.493,34.045,128.36l154.586,154.588V229.053z"></path>
                                                <g>
                                                    <polygon style="fill:#D8D8DA;"
                                                             points="188.632,229.053 229.053,188.633 282.947,188.633 282.947,188.632 229.053,188.632 "></polygon>
                                                    <polygon style="fill:#D8D8DA;"
                                                             points="229.053,323.367 188.632,282.947 229.053,323.368 282.947,323.368 323.368,282.947 282.947,323.367 "></polygon>
                                                </g>
                                                <path style="fill:#B4D8F1;"
                                                      d="M503.024,188.632H282.947v0.001h0.958l39.463,40.42L477.955,383.64 C499.611,346.068,512,302.482,512,256C512,232.681,508.865,210.099,503.024,188.632z"></path>
                                                <path style="fill:#ACFFF4;"
                                                      d="M323.368,282.947v220.075c65.905-17.932,121.238-61.517,154.586-119.382L323.368,229.053V282.947z"></path>
                                                <path style="fill:#95D5A7;"
                                                      d="M282.947,323.368L128.361,477.956C165.932,499.61,209.518,512,256,512 c23.319,0,45.899-3.135,67.368-8.977V282.947L282.947,323.368z"></path>
                                                <path style="fill:#F8E99B;"
                                                      d="M229.053,323.368H8.976C26.91,389.274,70.493,444.606,128.36,477.956l154.588-154.588H229.053z"></path>
                                                <path style="fill:#EFC27B;"
                                                      d="M188.632,282.947L34.045,128.36C12.389,165.932,0,209.518,0,256c0,23.319,3.135,45.901,8.976,67.368 h220.076L188.632,282.947z"></path>
                                                <polygon style="fill:#D8D8DA;"
                                                         points="283.905,188.633 282.947,188.633 323.368,229.053 "></polygon>
                                                <path style="fill:#B681D5;"
                                                      d="M503.024,188.632C485.09,122.726,441.507,67.394,383.64,34.044L256,161.684v26.947h26.947H503.024z"></path>
                                                <path style="fill:#E592BF;"
                                                      d="M383.639,34.044C346.068,12.39,302.482,0,256,0v161.684L383.639,34.044z"></path>
                                                <path style="fill:#80CB93;"
                                                      d="M256,350.316V512c23.319,0,45.899-3.135,67.368-8.977V282.947l-40.421,40.421L256,350.316z"></path>
                                                <polygon style="fill:#F6E27D;"
                                                         points="282.947,323.368 256,323.368 256,350.316 "></polygon>
                                            </g></svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['color']}}</div>
                                </div>
                                <div class="flex mt-2">
                                    <div>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1,.cls-2{fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}.cls-1{fill-rule:evenodd;}</style> </defs> <g id="ic-statistics-speed"> <path class="cls-1" d="M3,16V15a9,9,0,0,1,9-9h0a9,9,0,0,1,9,9v1"></path> <circle class="cls-2" cx="12" cy="16" r="2"></circle> <line class="cls-2" x1="13.41" y1="14.59" x2="16.5" y2="11.5"></line> </g> </g></svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['base_experience']}}</div>
                                </div>
                            </a>
                    @endforeach

                    <!-- More products... -->
                    </div>
                </div>
            @endif

            @if(isset($mediumPokemons))
                <div class="mx-auto max-w-2xl px-4 sm:px-6 sm:pt-4 sm:pb-24 lg:max-w-7xl lg:px-8">
                    <h2 class="pb-8 text-center text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl ">Doubtful but ok</h2>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach($mediumPokemons as $pokemon)
                            <a href="#" class="group">
                                <div
                                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                    <img src="{{$pokemon['img']}}"
                                         alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                         class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                                <h3 class="mt-4 text-gray-700 font-bold">{{$pokemon['name']}}</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900"></p>

                                <div class="flex mt-2">
                                    <div>
                                        <svg height="24px" width="24px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 511.983 511.983" xml:space="preserve" fill="#000000"><g
                                                id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path style="fill:#967ADC;"
                                                      d="M444.879,3.117c-4.171-4.156-10.921-4.156-15.093,0l0,0L355.789,77.13l15.077,15.078l73.997-73.998 h0.016C449.035,14.039,449.035,7.289,444.879,3.117z"></path>
                                                <path style="fill:#AC92EB;"
                                                      d="M444.863,48.366L444.863,48.366L444.863,48.366L444.863,48.366L444.863,48.366L399.646,3.149 c0,0,0-0.016-0.016-0.016c-4.156-4.156-10.906-4.156-15.077,0c-4.172,4.171-4.172,10.921,0,15.093l0,0l45.217,45.202 c0,0.016,0,0.016,0,0.016c4.172,4.171,10.922,4.171,15.093,0C449.02,59.287,449.02,52.522,444.863,48.366z"></path>
                                                <path style="fill:#D770AD;"
                                                      d="M170.654,396.659v104.669c0,5.89,4.766,10.655,10.656,10.655s10.671-4.766,10.671-10.655V396.659 H170.654z"></path>
                                                <g>
                                                    <path style="fill:#EC87C0;"
                                                          d="M181.311,170.659c-64.795,0-117.324,52.529-117.324,117.332c0,64.81,52.529,117.339,117.324,117.339 c64.81,0,117.34-52.529,117.34-117.339C298.65,223.188,246.12,170.659,181.311,170.659z M249.199,355.879 c-18.14,18.125-42.249,28.109-67.888,28.109c-25.64,0-49.749-9.984-67.873-28.109c-18.14-18.14-28.124-42.248-28.124-67.888 c0-25.647,9.984-49.756,28.124-67.881c18.125-18.14,42.233-28.124,67.873-28.124s49.748,9.984,67.888,28.124 c18.125,18.125,28.108,42.233,28.108,67.881C277.306,313.631,267.323,337.739,249.199,355.879z"></path>
                                                    <path style="fill:#EC87C0;"
                                                          d="M213.294,479.984h-63.951c-5.891,0-10.672-4.766-10.672-10.656s4.781-10.671,10.672-10.671h63.951 c5.891,0,10.672,4.78,10.672,10.671S219.184,479.984,213.294,479.984z"></path>
                                                </g>
                                                <path style="fill:#AC92EB;"
                                                      d="M369.429,78.537c-22.906-22.905-52.937-34.358-82.967-34.358s-60.061,11.453-82.966,34.358 c-45.811,45.826-45.811,120.121,0,165.932c20.468,20.469,46.608,31.788,73.356,33.976c-0.75-7.57-2.375-14.944-4.828-22.007 c-20.155-3.031-38.764-12.359-53.435-27.046c-18.14-18.141-28.124-42.233-28.124-67.889c0-25.64,9.984-49.748,28.124-67.873 c18.125-18.125,42.233-28.125,67.873-28.125c25.641,0,49.748,10,67.873,28.125c18.14,18.125,28.124,42.233,28.124,67.873 c0,25.655-9.984,49.748-28.108,67.889c-16.219,16.202-37.218,25.905-59.811,27.78c1.859,6.797,3.109,13.843,3.703,21.085 c25.983-2.609,51.279-13.866,71.186-33.788C415.24,198.658,415.24,124.363,369.429,78.537z"></path>
                                            </g></svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['gender']}}</div>
                                </div>
                                <div class="flex mt-2">
                                    <div>
                                        <svg height="24px" width="24px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 503.467 503.467" xml:space="preserve" fill="#000000"><g
                                                id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g transform="translate(1 1)">
                                                    <path style="fill:#80D6FA;"
                                                          d="M139.8,498.2H191V327.533h-51.2V498.2z M311.32,498.2h50.347V344.6H311.32V498.2z M395.8,498.2H447 V225.133h-51.2V498.2z M225.133,498.2h51.2V293.4h-51.2V498.2z M54.467,498.2h51.2V395.8h-51.2V498.2z"></path>
                                                    <path style="fill:#FFD0A1;"
                                                          d="M250.733,54.467c14.507,0,25.6,11.093,25.6,25.6c0,6.827-2.56,13.653-7.68,17.92 c-4.267,4.267-11.093,7.68-17.92,7.68c-14.507,0-25.6-11.093-25.6-25.6S236.227,54.467,250.733,54.467z M353.987,147.48 c4.267,4.267,7.68,11.093,7.68,17.92c0,14.507-11.093,25.6-25.6,25.6s-25.6-11.093-25.6-25.6c0-6.827,2.56-13.653,7.68-17.92 c4.267-4.267,11.093-7.68,17.92-7.68S349.72,142.36,353.987,147.48z M472.6,3.267c14.507,0,25.6,11.093,25.6,25.6 s-11.093,25.6-25.6,25.6c-6.827,0-13.653-2.56-17.92-7.68c-4.267-4.267-7.68-11.093-7.68-17.92 C447,14.36,458.093,3.267,472.6,3.267z M28.867,259.267c14.507,0,25.6,11.093,25.6,25.6s-11.093,25.6-25.6,25.6 s-25.6-11.093-25.6-25.6S14.36,259.267,28.867,259.267z"></path>
                                                </g>
                                                <path style="fill:#51565F;"
                                                      d="M499.2,503.467H4.267C1.707,503.467,0,501.76,0,499.2c0-2.56,1.707-4.267,4.267-4.267H51.2V396.8 c0-2.56,1.707-4.267,4.267-4.267h51.2c2.56,0,4.267,1.707,4.267,4.267v98.133h25.6v-166.4c0-2.56,1.707-4.267,4.267-4.267H192 c2.56,0,4.267,1.707,4.267,4.267v166.4h25.6V294.4c0-2.56,1.707-4.267,4.267-4.267h51.2c2.56,0,4.267,1.707,4.267,4.267v200.533 h26.453V345.6c0-2.56,1.707-4.267,4.267-4.267h50.347c2.56,0,4.267,1.707,4.267,4.267v149.333h25.6v-268.8 c0-2.56,1.707-4.267,4.267-4.267H448c2.56,0,4.267,1.707,4.267,4.267v268.8H499.2c2.56,0,4.267,1.707,4.267,4.267 C503.467,501.76,501.76,503.467,499.2,503.467z M401.067,494.934h42.667V230.4h-42.667V494.934z M316.587,494.934H358.4V349.867 h-41.813V494.934z M230.4,494.934h42.667V298.667H230.4V494.934z M145.067,494.934h42.667V332.8h-42.667V494.934z M59.733,494.934 H102.4v-93.867H59.733V494.934z M29.867,315.733C13.653,315.733,0,302.08,0,285.867S13.653,256,29.867,256 c8.533,0,17.067,4.267,22.187,10.24L224.427,93.867c-1.707-3.413-2.56-7.68-2.56-12.8c0-16.213,13.653-29.867,29.867-29.867 S281.6,64.854,281.6,81.067c0,6.827-2.56,12.8-5.973,17.92l43.52,43.52c5.12-3.413,11.093-5.973,17.92-5.973s12.8,2.56,17.92,5.973 l94.72-94.72c-3.413-5.12-5.973-11.093-5.973-17.92C443.734,13.654,457.387,0,473.6,0s29.867,13.653,29.867,29.867 S489.814,59.733,473.6,59.733c-6.827,0-12.8-2.56-17.92-5.973l-94.72,94.72c3.413,5.12,5.973,11.093,5.973,17.92 c0,16.213-13.653,29.867-29.867,29.867c-16.213,0-29.867-13.653-29.867-29.867c0-6.827,2.56-12.8,5.973-17.92l-43.52-43.52 c-5.12,3.413-11.093,5.973-17.92,5.973c-8.533,0-17.067-4.267-22.187-10.24L57.173,273.067c1.707,3.413,2.56,7.68,2.56,12.8 C59.733,302.08,46.08,315.733,29.867,315.733z M29.867,264.533c-11.947,0-21.333,9.387-21.333,21.333 c0,11.947,9.387,21.333,21.333,21.333S51.2,297.813,51.2,285.867C51.2,273.92,41.813,264.533,29.867,264.533z M337.067,145.067 c-11.947,0-21.333,9.387-21.333,21.333c0,11.947,9.387,21.333,21.333,21.333S358.4,178.347,358.4,166.4 C358.4,154.454,349.013,145.067,337.067,145.067z M251.733,59.733c-11.947,0-21.333,9.387-21.333,21.333s9.387,21.333,21.333,21.333 c11.947,0,21.333-9.387,21.333-21.333S263.68,59.733,251.733,59.733z M459.093,45.227c3.413,3.413,9.387,5.973,14.507,5.973 c11.947,0,21.333-9.387,21.333-21.333S485.547,8.533,473.6,8.533c-11.947,0-21.333,9.387-21.333,21.333 C452.267,35.84,454.827,40.96,459.093,45.227C458.24,44.374,458.24,44.374,459.093,45.227L459.093,45.227z"></path>
                                            </g></svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['growth_rate']}}</div>
                                </div>
                                <div class="flex mt-2">
                                    <div>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M2 9V6.5C2 4.01 4.01 2 6.5 2H9" stroke="#292D32" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15 2H17.5C19.99 2 22 4.01 22 6.5V9" stroke="#292D32"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path d="M22 16V17.5C22 19.99 19.99 22 17.5 22H16" stroke="#292D32"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path d="M9 22H6.5C4.01 22 2 19.99 2 17.5V15" stroke="#292D32"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path opacity="0.4"
                                                      d="M8.5 11C9.88071 11 11 9.88071 11 8.5C11 7.11929 9.88071 6 8.5 6C7.11929 6 6 7.11929 6 8.5C6 9.88071 7.11929 11 8.5 11Z"
                                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path opacity="0.4"
                                                      d="M7.5 18C8.32843 18 9 17.3284 9 16.5C9 15.6716 8.32843 15 7.5 15C6.67157 15 6 15.6716 6 16.5C6 17.3284 6.67157 18 7.5 18Z"
                                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path opacity="0.4"
                                                      d="M16.5 9C17.3284 9 18 8.32843 18 7.5C18 6.67157 17.3284 6 16.5 6C15.6716 6 15 6.67157 15 7.5C15 8.32843 15.6716 9 16.5 9Z"
                                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path opacity="0.4"
                                                      d="M15.5 18C16.8807 18 18 16.8807 18 15.5C18 14.1193 16.8807 13 15.5 13C14.1193 13 13 14.1193 13 15.5C13 16.8807 14.1193 18 15.5 18Z"
                                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['nature']}}</div>
                                </div>
                                <div class="flex mt-2">
                                    <div>
                                        <svg height="24px" width="24px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g
                                                id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path style="fill:#D8D8DA;"
                                                      d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,336.842c-44.648,0-80.842-36.194-80.842-80.842s36.194-80.842,80.842-80.842s80.842,36.194,80.842,80.842 S300.648,336.842,256,336.842z"></path>
                                                <path style="fill:#D4B6E6;"
                                                      d="M282.947,188.632h220.076C485.09,122.726,441.507,67.394,383.64,34.044L229.053,188.632H282.947z"></path>
                                                <path style="fill:#EBAFD1;"
                                                      d="M229.053,188.632L383.639,34.044C346.068,12.39,302.482,0,256,0c-23.319,0-45.899,3.135-67.368,8.978 v220.075L229.053,188.632z"></path>
                                                <path style="fill:#E07188;"
                                                      d="M188.632,229.053V8.978C122.726,26.91,67.394,70.493,34.045,128.36l154.586,154.588V229.053z"></path>
                                                <g>
                                                    <polygon style="fill:#D8D8DA;"
                                                             points="188.632,229.053 229.053,188.633 282.947,188.633 282.947,188.632 229.053,188.632 "></polygon>
                                                    <polygon style="fill:#D8D8DA;"
                                                             points="229.053,323.367 188.632,282.947 229.053,323.368 282.947,323.368 323.368,282.947 282.947,323.367 "></polygon>
                                                </g>
                                                <path style="fill:#B4D8F1;"
                                                      d="M503.024,188.632H282.947v0.001h0.958l39.463,40.42L477.955,383.64 C499.611,346.068,512,302.482,512,256C512,232.681,508.865,210.099,503.024,188.632z"></path>
                                                <path style="fill:#ACFFF4;"
                                                      d="M323.368,282.947v220.075c65.905-17.932,121.238-61.517,154.586-119.382L323.368,229.053V282.947z"></path>
                                                <path style="fill:#95D5A7;"
                                                      d="M282.947,323.368L128.361,477.956C165.932,499.61,209.518,512,256,512 c23.319,0,45.899-3.135,67.368-8.977V282.947L282.947,323.368z"></path>
                                                <path style="fill:#F8E99B;"
                                                      d="M229.053,323.368H8.976C26.91,389.274,70.493,444.606,128.36,477.956l154.588-154.588H229.053z"></path>
                                                <path style="fill:#EFC27B;"
                                                      d="M188.632,282.947L34.045,128.36C12.389,165.932,0,209.518,0,256c0,23.319,3.135,45.901,8.976,67.368 h220.076L188.632,282.947z"></path>
                                                <polygon style="fill:#D8D8DA;"
                                                         points="283.905,188.633 282.947,188.633 323.368,229.053 "></polygon>
                                                <path style="fill:#B681D5;"
                                                      d="M503.024,188.632C485.09,122.726,441.507,67.394,383.64,34.044L256,161.684v26.947h26.947H503.024z"></path>
                                                <path style="fill:#E592BF;"
                                                      d="M383.639,34.044C346.068,12.39,302.482,0,256,0v161.684L383.639,34.044z"></path>
                                                <path style="fill:#80CB93;"
                                                      d="M256,350.316V512c23.319,0,45.899-3.135,67.368-8.977V282.947l-40.421,40.421L256,350.316z"></path>
                                                <polygon style="fill:#F6E27D;"
                                                         points="282.947,323.368 256,323.368 256,350.316 "></polygon>
                                            </g></svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['color']}}</div>
                                </div>
                                <div class="flex mt-2">
                                    <div>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1,.cls-2{fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}.cls-1{fill-rule:evenodd;}</style> </defs> <g id="ic-statistics-speed"> <path class="cls-1" d="M3,16V15a9,9,0,0,1,9-9h0a9,9,0,0,1,9,9v1"></path> <circle class="cls-2" cx="12" cy="16" r="2"></circle> <line class="cls-2" x1="13.41" y1="14.59" x2="16.5" y2="11.5"></line> </g> </g></svg>
                                    </div>
                                    <div class="ml-2">{{$pokemon['base_experience']}}</div>
                                </div>
                            </a>
                    @endforeach

                    <!-- More products... -->
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
