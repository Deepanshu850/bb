<!-- subscribe -->
<div class="lg:pt-20 md:pt-14 xs:pt-12 pt-10">
    <div class="footer-bg py-10">
        <div class="container mx-auto max-w-7xl xl:px-0 lg:px-10 md:px-8 px-4">
            <div class="lg:flex items-center justify-between">
                <div class="lg:w-1/2 lg:mb-0 mb-4 lg:text-start text-center">
                    <p class="text-black sm:text-[28px] text-2xl font-semibold">
                        {{ __('messages.subscribe_to_our_newsletter') }}
                    </p>
                </div>
                {{ Form::open(['route' => 'subscribe.store', 'class' => 'lg:w-1/2', 'id' => 'subscriberForm']) }}
                <div class=" lg:flex  justify-end text-center ">

                    <input type="email" name="email" id="email_2"
                        class="bg-white max-w-lg w-full rounded-lg p-3 px-5 text-gray-400 text-base font-semibold placeholder:text-gray-400 focus-visible:outline-primary subscribe-form"
                        placeholder="{{ __('messages.contact_us.enter_your_email') }}" required />
                    <button type="submit"
                        class="bg-primary text-white rounded-lg font-bold text-sm py-3 px-10 md:mt-0 mt-4 subscribe-btn md:ms-6">
                        {{ __('messages.common.subscribe') }}
                    </button>
                    <div class="form-response1" id="formResponse"></div>

                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container xl:px-10 md:px-8 px-4 mx-auto">
        <div class="flex items-center justify-center xs:pt-12 pt-10 xs:pb-10 pb-8">
            <a href="/" class="h-14 w-auto">
                <img src="{{ $settings['logo'] }}" class="h-full w-14" loading="lazy" alt="logo-img" />
            </a>
            <span class="font-bold text-[28px] ml-5 text-black">{{ $settings['application_name'] }}</span>
        </div>
        <div class="flex flex-wrap gap-x-8 justify-center pb-10">
            @foreach (getCategory()->take(6) as $category)
                <a href="{{ route('categoryPage', $category->slug) }}"
                    class="text-sm font-medium hover:text-primary my-2">{!! $category->name !!}</a>
            @endforeach
            <a href="{{ route('page.Terms') }}"
                class="text-sm font-medium hover:text-primary my-2 {{ Request::is('terms-conditions*') ? 'text-primary' : '' }}">{{ __('messages.setting.terms-conditions') }}</a>
            <a href="{{ route('page.support') }}"
                class="text-sm font-medium hover:text-primary my-2 {{ Request::is('support*') ? 'text-primary' : '' }}">{{ __('messages.setting.support') }}</a>
            <a href="{{ route('page.privacy') }}"
                class="text-sm font-medium hover:text-primary my-2 {{ Request::is('privacy*') ? 'text-primary' : '' }}">{{ __('messages.setting.privacy') }}</a>
        </div>
        <div class="flex flex-wrap justify-center items-center sm:gap-x-10 xs:gap-x-8 gap-x-6">
            <a class="group mb-2.5" href="{{ $settings['facebook_url'] }}" aria-label="social-media">
                <svg class="fill-current text-black group-hover:text-blue-500 w-6 h-6" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16 8.02005C16 3.59298 12.416 0 8 0C3.584 0 0 3.59298 0 8.02005C0 11.9018 2.752 15.1338 6.4 15.8797V10.4261H4.8V8.02005H6.4V6.01504C6.4 4.46717 7.656 3.20802 9.2 3.20802H11.2V5.61404H9.6C9.16 5.61404 8.8 5.97494 8.8 6.41604V8.02005H11.2V10.4261H8.8V16C12.84 15.599 16 12.1825 16 8.02005Z">
                    </path>
                </svg>
            </a>
            <a class="group mb-2.5" href="{{ $settings['twitter_url'] }}" aria-label="social-media">
                <svg class="fill-current text-black group-hover:text-blue-500 w-6 h-6" viewBox="0 0 17 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.6666 2.25348C16.0782 2.50293 15.4462 2.67148 14.7817 2.74766C15.4673 2.35514 15.9802 1.73737 16.2248 1.00961C15.5806 1.37569 14.8756 1.63336 14.1404 1.77144C13.646 1.26639 12.9912 0.931627 12.2775 0.819138C11.5639 0.706649 10.8314 0.822723 10.1938 1.14934C9.55617 1.47596 9.0491 1.99484 8.75129 2.62543C8.45349 3.25602 8.38162 3.96304 8.54683 4.63672C7.24158 4.57402 5.9647 4.24944 4.79905 3.68404C3.6334 3.11864 2.60503 2.32505 1.78069 1.35479C1.49883 1.81998 1.33676 2.35933 1.33676 2.93373C1.33644 3.45083 1.46954 3.96001 1.72423 4.41608C1.97893 4.87216 2.34735 5.26104 2.79681 5.54822C2.27556 5.53235 1.76581 5.3976 1.30998 5.15517V5.19562C1.30993 5.92087 1.57214 6.6238 2.05212 7.18514C2.53209 7.74647 3.20028 8.13165 3.94329 8.27529C3.45974 8.4005 2.95278 8.41894 2.46069 8.32923C2.67032 8.95326 3.07867 9.49896 3.62857 9.88992C4.17847 10.2809 4.84238 10.4975 5.52737 10.5095C4.36456 11.3829 2.9285 11.8566 1.45021 11.8545C1.18834 11.8546 0.926699 11.84 0.666626 11.8107C2.16718 12.7338 3.91394 13.2237 5.6979 13.2218C11.7368 13.2218 15.0382 8.43642 15.0382 4.28615C15.0382 4.15131 15.0346 4.01513 15.0283 3.88029C15.6704 3.43598 16.2247 2.8858 16.6652 2.2555L16.6666 2.25348Z">
                    </path>
                </svg>
            </a>
            <a class="group mb-2.5" href="{{ $settings['linkedin_url'] }}" aria-label="social-media"><svg
                    class="fill-current text-black group-hover:text-blue-600 w-6 h-6" viewBox="0 0 17 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.27657 5.5752H9.24777V7.0552C9.67577 6.204 10.7734 5.4392 12.4222 5.4392C15.583 5.4392 16.3334 7.1336 16.3334 10.2424V16H13.1334V10.9504C13.1334 9.18 12.7054 8.1816 11.6158 8.1816C10.1046 8.1816 9.47657 9.2576 9.47657 10.9496V16H6.27657V5.5752ZM0.789374 15.864H3.98937V5.4392H0.789374V15.864ZM4.44777 2.04C4.44789 2.30822 4.3947 2.57379 4.29128 2.82127C4.18787 3.06875 4.0363 3.29321 3.84537 3.4816C3.45849 3.8661 2.93482 4.08132 2.38937 4.08C1.84489 4.07963 1.32242 3.86496 0.934974 3.4824C0.744743 3.29337 0.593683 3.06866 0.490449 2.82115C0.387215 2.57363 0.333837 2.30818 0.333374 2.04C0.333374 1.4984 0.549374 0.98 0.935774 0.5976C1.32288 0.214527 1.84557 -0.000239369 2.39017 2.00212e-07C2.93577 2.00212e-07 3.45897 0.2152 3.84537 0.5976C4.23097 0.98 4.44777 1.4984 4.44777 2.04Z">
                    </path>
                </svg>
            </a>
            <a class="group mb-2.5" href="{{ $settings['pinterest_url'] }}" aria-label="social-media"><svg
                    class="fill-current text-black group-hover:text-red-600 w-6 h-6" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.00509 1.61021e-06C6.13979 -0.00118135 4.3327 0.649478 2.8963 1.83948C1.45989 3.02947 0.484465 4.684 0.138677 6.51697C-0.207111 8.34994 0.0984782 10.2461 1.00261 11.8777C1.90673 13.5092 3.35256 14.7735 5.09009 15.452C5.02009 14.819 4.95609 13.846 5.11709 13.155C5.26309 12.53 6.05509 9.178 6.05509 9.178C6.05509 9.178 5.81609 8.699 5.81609 7.991C5.81609 6.878 6.46109 6.048 7.26409 6.048C7.94609 6.048 8.27609 6.56 8.27609 7.175C8.27609 7.861 7.83909 8.887 7.61309 9.838C7.42509 10.634 8.01309 11.284 8.79809 11.284C10.2201 11.284 11.3131 9.784 11.3131 7.62C11.3131 5.705 9.93609 4.366 7.97109 4.366C5.69509 4.366 4.35909 6.073 4.35909 7.837C4.35909 8.525 4.62409 9.262 4.95409 9.663C4.98251 9.69323 5.0026 9.73031 5.01242 9.77062C5.02223 9.81093 5.02143 9.85309 5.01009 9.893C4.94909 10.145 4.81409 10.689 4.78809 10.8C4.75309 10.946 4.67209 10.977 4.52009 10.907C3.52009 10.442 2.89609 8.981 2.89609 7.807C2.89609 5.284 4.73009 2.967 8.18209 2.967C10.9571 2.967 13.1141 4.944 13.1141 7.587C13.1141 10.344 11.3751 12.563 8.96309 12.563C8.15209 12.563 7.39009 12.142 7.12909 11.644L6.63109 13.546C6.45009 14.241 5.96209 15.112 5.63609 15.643C6.73606 15.9831 7.89648 16.0818 9.03809 15.9323C10.1797 15.7828 11.2756 15.3886 12.2509 14.7767C13.2262 14.1648 14.0579 13.3496 14.6892 12.3868C15.3206 11.424 15.7367 10.3362 15.9091 9.19787C16.0815 8.0595 16.0061 6.89733 15.6882 5.79075C15.3702 4.68418 14.8171 3.65927 14.0668 2.78604C13.3164 1.91281 12.3863 1.21184 11.3402 0.731016C10.294 0.250192 9.15644 0.000842303 8.00509 1.61021e-06Z">
                    </path>
                </svg>
            </a>
            <a class="group mb-2.5" href="{{ $settings['instagram_url'] }}" aria-label="social-media"><svg
                    class="fill-current text-black group-hover:text-primary w-6 h-6" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m16 12v-.001c0-2.209-1.791-4-4-4s-4 1.791-4 4 1.791 4 4 4c1.104 0 2.104-.448 2.828-1.171.723-.701 1.172-1.682 1.172-2.768 0-.021 0-.042-.001-.063v.003zm2.16 0c-.012 3.379-2.754 6.114-6.135 6.114-3.388 0-6.135-2.747-6.135-6.135s2.747-6.135 6.135-6.135c1.694 0 3.228.687 4.338 1.797 1.109 1.08 1.798 2.587 1.798 4.256 0 .036 0 .073-.001.109v-.005zm1.687-6.406v.002c0 .795-.645 1.44-1.44 1.44s-1.44-.645-1.44-1.44.645-1.44 1.44-1.44c.398 0 .758.161 1.018.422.256.251.415.601.415.988v.029-.001zm-7.84-3.44-1.195-.008q-1.086-.008-1.649 0t-1.508.047c-.585.02-1.14.078-1.683.17l.073-.01c-.425.07-.802.17-1.163.303l.043-.014c-1.044.425-1.857 1.237-2.272 2.254l-.01.027c-.119.318-.219.695-.284 1.083l-.005.037c-.082.469-.14 1.024-.159 1.589l-.001.021q-.039.946-.047 1.508t0 1.649.008 1.195-.008 1.195 0 1.649.047 1.508c.02.585.078 1.14.17 1.683l-.01-.073c.07.425.17.802.303 1.163l-.014-.043c.425 1.044 1.237 1.857 2.254 2.272l.027.01c.318.119.695.219 1.083.284l.037.005c.469.082 1.024.14 1.588.159l.021.001q.946.039 1.508.047t1.649 0l1.188-.024 1.195.008q1.086.008 1.649 0t1.508-.047c.585-.02 1.14-.078 1.683-.17l-.073.01c.425-.07.802-.17 1.163-.303l-.043.014c1.044-.425 1.857-1.237 2.272-2.254l.01-.027c.119-.318.219-.695.284-1.083l.005-.037c.082-.469.14-1.024.159-1.588l.001-.021q.039-.946.047-1.508t0-1.649-.008-1.195.008-1.195 0-1.649-.047-1.508c-.02-.585-.078-1.14-.17-1.683l.01.073c-.07-.425-.17-.802-.303-1.163l.014.043c-.425-1.044-1.237-1.857-2.254-2.272l-.027-.01c-.318-.119-.695-.219-1.083-.284l-.037-.005c-.469-.082-1.024-.14-1.588-.159l-.021-.001q-.946-.039-1.508-.047t-1.649 0zm11.993 9.846q0 3.578-.08 4.953c.005.101.009.219.009.337 0 3.667-2.973 6.64-6.64 6.64-.119 0-.237-.003-.354-.009l.016.001q-1.375.08-4.953.08t-4.953-.08c-.101.005-.219.009-.337.009-3.667 0-6.64-2.973-6.64-6.64 0-.119.003-.237.009-.354l-.001.016q-.08-1.375-.08-4.953t.08-4.953c-.005-.101-.009-.219-.009-.337 0-3.667 2.973-6.64 6.64-6.64.119 0 .237.003.354.009l-.016-.001q1.375-.08 4.953-.08t4.953.08c.101-.005.219-.009.337-.009 3.667 0 6.64 2.973 6.64 6.64 0 .119-.003.237-.009.354l.001-.016q.08 1.374.08 4.953z" />
                </svg>
            </a>
            <a class="group mb-2.5" href="{{ $settings['vk_url'] }}" aria-label="social-media"><svg
                    class="fill-current text-black group-hover:text-primary w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512">
                    <path
                        d="M31.5 63.5C0 95 0 145.7 0 247V265C0 366.3 0 417 31.5 448.5C63 480 113.7 480 215 480H233C334.3 480 385 480 416.5 448.5C448 417 448 366.3 448 265V247C448 145.7 448 95 416.5 63.5C385 32 334.3 32 233 32H215C113.7 32 63 32 31.5 63.5zM75.6 168.3H126.7C128.4 253.8 166.1 290 196 297.4V168.3H244.2V242C273.7 238.8 304.6 205.2 315.1 168.3H363.3C359.3 187.4 351.5 205.6 340.2 221.6C328.9 237.6 314.5 251.1 297.7 261.2C316.4 270.5 332.9 283.6 346.1 299.8C359.4 315.9 369 334.6 374.5 354.7H321.4C316.6 337.3 306.6 321.6 292.9 309.8C279.1 297.9 262.2 290.4 244.2 288.1V354.7H238.4C136.3 354.7 78 284.7 75.6 168.3z" />
                </svg>
            </a>
            <a class="group mb-2.5" href="{{ $settings['telegram_url'] }}" aria-label="social-media"><svg
                    xmlns="http://www.w3.org/2000/svg" class="fill-current text-black group-hover:text-blue-500 w-6 h-6"
                    viewBox="0 0 496 512">
                    <path
                        d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z" />
                </svg>
            </a>
            <a class="group mb-2.5" href="{{ $settings['youtube_url'] }}" aria-label="social-media"><svg
                    xmlns="http://www.w3.org/2000/svg" class="fill-current text-black group-hover:text-red-500 w-6 h-6"
                    viewBox="0 0 576 512">
                    <path
                        d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                </svg>
            </a>
        </div>
        <div class="py-8 text-center">
            <p class="text-sm font-medium text-gray-200">
                {{ __('messages.common.all_rights') }} © {{ Illuminate\Support\Carbon::now()->format('Y') }}
                {{ $settings['application_name'] }}
            </p>
        </div>
    </div>
</div>