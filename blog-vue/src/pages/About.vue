<template>
    <div class="drawer-content flex justify-center lg:justify-start">
        <div class="lg:w-[60vw] max-w-screen-lg lg:pt-4 lg:p-4">
            <div class="navbar bg-base-100 lg:hidden sticky top-0 w-full z-50">
                <div class="flex-none">
                    <label
                            for="my-drawer-2"
                            class="btn btn-square btn-ghost lg:hidden"
                    >
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="inline-block w-5 h-5 stroke-current"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                            ></path>
                        </svg>
                    </label>
                </div>
                <div class="flex-1">
                    <a class="btn btn-ghost normal-case text-xl" href="./">Sarissa Blog</a>
                </div>
                <div class="flex-none">
                    <button
                            data-set-theme="winter"
                            class="btn btn-sm btn-ghost btn-square"
                            data-act-class="btn-active"
                    >
                        <svg
                                class="inline-block w-4 h-4 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                        >
                            <title>ionicons-v5-q</title>
                            <path
                                    d="M256,118a22,22,0,0,1-22-22V48a22,22,0,0,1,44,0V96A22,22,0,0,1,256,118Z"
                            />
                            <path
                                    d="M256,486a22,22,0,0,1-22-22V416a22,22,0,0,1,44,0v48A22,22,0,0,1,256,486Z"
                            />
                            <path
                                    d="M369.14,164.86a22,22,0,0,1-15.56-37.55l33.94-33.94a22,22,0,0,1,31.11,31.11l-33.94,33.94A21.93,21.93,0,0,1,369.14,164.86Z"
                            />
                            <path
                                    d="M108.92,425.08a22,22,0,0,1-15.55-37.56l33.94-33.94a22,22,0,1,1,31.11,31.11l-33.94,33.94A21.94,21.94,0,0,1,108.92,425.08Z"
                            />
                            <path
                                    d="M464,278H416a22,22,0,0,1,0-44h48a22,22,0,0,1,0,44Z"
                            />
                            <path d="M96,278H48a22,22,0,0,1,0-44H96a22,22,0,0,1,0,44Z"/>
                            <path
                                    d="M403.08,425.08a21.94,21.94,0,0,1-15.56-6.45l-33.94-33.94a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.55,37.56Z"
                            />
                            <path
                                    d="M142.86,164.86a21.89,21.89,0,0,1-15.55-6.44L93.37,124.48a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.56,37.55Z"
                            />
                            <path
                                    d="M256,358A102,102,0,1,1,358,256,102.12,102.12,0,0,1,256,358Z"
                            />
                        </svg>
                    </button>
                    <button
                            data-set-theme="garden"
                            class="btn btn-sm btn-ghost btn-square"
                            data-act-class="btn-active"
                    >
                        <svg
                                class="inline-block w-4 h-4 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                            />
                        </svg>
                    </button>
                    <button
                            data-set-theme="dark"
                            class="btn btn-sm btn-ghost btn-square"
                            data-act-class="btn-active"
                    >
                        <svg
                                class="inline-block w-4 h-4 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                        >
                            <title>ionicons-v5-j</title>
                            <path
                                    d="M152.62,126.77c0-33,4.85-66.35,17.23-94.77C87.54,67.83,32,151.89,32,247.38,32,375.85,136.15,480,264.62,480c95.49,0,179.55-55.54,215.38-137.85-28.42,12.38-61.8,17.23-94.77,17.23C256.76,359.38,152.62,255.24,152.62,126.77Z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex-1 p-3 md:py-[35]">
                <div class="space-y-2 md:space-y-6">
                    <div class="card bg-base-200 shadow-xl">
                        <div class="card-body">
                            <h1 class="text-3xl font-extrabold">About</h1>
                        </div>
                    </div>
                    <div class="card bg-base-200 shadow-xl">
                        <div class="card-body">
                            <article class="prose max-w-none">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Malesuada fames ac turpis egestas integer eget
                                    aliquet nibh. Et tortor at risus viverra adipiscing at in
                                    tellus integer. In nisl nisi scelerisque eu ultrices vitae
                                    auctor eu. Sit amet est placerat in egestas erat imperdiet
                                    sed. Amet justo donec enim diam vulputate. Commodo quis
                                    imperdiet massa tincidunt nunc pulvinar. Id diam maecenas
                                    ultricies mi eget mauris pharetra. Diam vel quam elementum
                                    pulvinar etiam non. Accumsan tortor posuere ac ut consequat
                                    semper viverra. Id aliquet risus feugiat in ante metus
                                    dictum.
                                </p>

                                <p>
                                    Viverra vitae congue eu consequat ac felis donec et odio.
                                    Cursus sit amet dictum sit amet. Eget sit amet tellus cras
                                    adipiscing enim eu turpis. Nibh ipsum consequat nisl vel
                                    pretium lectus. Urna et pharetra pharetra massa massa
                                    ultricies mi. Cras sed felis eget velit aliquet. Urna id
                                    volutpat lacus laoreet non curabitur gravida arcu. Est
                                    placerat in egestas erat imperdiet sed euismod. Viverra
                                    maecenas accumsan lacus vel. Nisi lacus sed viverra tellus.
                                    Ullamcorper malesuada proin libero nunc consequat interdum
                                    varius. Vestibulum lectus mauris ultrices eros. Nunc aliquet
                                    bibendum enim facilisis gravida neque. Blandit libero
                                    volutpat sed cras ornare arcu. Sed tempus urna et pharetra
                                    pharetra massa.
                                </p>

                                <p>
                                    Fames ac turpis egestas integer eget. Massa ultricies mi
                                    quis hendrerit dolor. Et ultrices neque ornare aenean
                                    euismod. Nunc sed blandit libero volutpat sed cras ornare
                                    arcu dui. Ac ut consequat semper viverra nam. Quis blandit
                                    turpis cursus in hac. Risus at ultrices mi tempus imperdiet
                                    nulla. Velit sed ullamcorper morbi tincidunt ornare massa
                                    eget. Eleifend quam adipiscing vitae proin. Orci sagittis eu
                                    volutpat odio facilisis mauris sit. Accumsan sit amet nulla
                                    facilisi morbi tempus iaculis. Cras fermentum odio eu
                                    feugiat pretium. Cum sociis natoque penatibus et magnis dis
                                    parturient montes nascetur. Mauris pellentesque pulvinar
                                    pellentesque habitant morbi tristique.
                                </p>

                                <p>
                                    Nunc faucibus a pellentesque sit amet porttitor eget dolor
                                    morbi. Tellus elementum sagittis vitae et leo duis ut diam
                                    quam. Montes nascetur ridiculus mus mauris vitae ultricies
                                    leo integer malesuada. Vivamus at augue eget arcu dictum
                                    varius. Consequat semper viverra nam libero. Hendrerit dolor
                                    magna eget est. Facilisis gravida neque convallis a cras
                                    semper auctor. Habitant morbi tristique senectus et netus.
                                    Consectetur libero id faucibus nisl tincidunt eget nullam
                                    non. Cursus risus at ultrices mi tempus. Egestas tellus
                                    rutrum tellus pellentesque eu tincidunt tortor aliquam
                                    nulla. Non odio euismod lacinia at. Rhoncus aenean vel elit
                                    scelerisque mauris pellentesque pulvinar pellentesque.
                                </p>

                                <p>
                                    Iaculis nunc sed augue lacus viverra vitae congue eu
                                    consequat. Quis enim lobortis scelerisque fermentum dui
                                    faucibus. Dictum at tempor commodo ullamcorper a lacus
                                    vestibulum. Lectus mauris ultrices eros in cursus turpis
                                    massa tincidunt. Praesent tristique magna sit amet purus.
                                    Aliquam eleifend mi in nulla. Id diam vel quam elementum
                                    pulvinar etiam non. Sodales neque sodales ut etiam sit amet
                                    nisl purus. Dictum varius duis at consectetur. Eget felis
                                    eget nunc lobortis.
                                </p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
