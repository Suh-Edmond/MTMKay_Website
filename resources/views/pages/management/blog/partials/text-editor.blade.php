
<div class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
    <div class="px-3 py-2 border-b dark:border-gray-600">
        <div class="flex flex-wrap items-center">
            <div class="flex items-center space-x-1 rtl:space-x-reverse flex-wrap">
                <button id="toggleBoldButton" data-tooltip-target="tooltip-bold" type="button" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5h4.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0-7H6m2 7h6.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0 0H6"/>
                    </svg>
                    <span class="sr-only">Bold</span>
                </button>
                <div id="tooltip-bold" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Toggle bold
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleItalicButton" data-tooltip-target="tooltip-italic" type="button" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.874 19 6.143-14M6 19h6.33m-.66-14H18"/>
                    </svg>
                    <span class="sr-only">Italic</span>
                </button>
                <div id="tooltip-italic" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Toggle italic
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleUnderlineButton" data-tooltip-target="tooltip-underline" type="button" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 19h12M8 5v9a4 4 0 0 0 8 0V5M6 5h4m4 0h4"/>
                    </svg>
                    <span class="sr-only">Underline</span>
                </button>
                <div id="tooltip-underline" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Toggle underline
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleStrikeButton" data-tooltip-target="tooltip-strike" type="button" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 6.2V5h12v1.2M7 19h6m.2-14-1.677 6.523M9.6 19l1.029-4M5 5l6.523 6.523M19 19l-7.477-7.477"/>
                    </svg>
                    <span class="sr-only">Strike</span>
                </button>
                <div id="tooltip-strike" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Toggle strike
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleSubscriptButton" data-tooltip-target="tooltip-subscript" type="button" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.9999 21h-4v-.5c1.0989-1.0329 3.75-2.5 3.75-3.5v-1.0001c0-.5523-.4477-.9999-1-.9999h-1.75c-.5523 0-1 .4477-1 1M3.99986 6l9.26894 11.5765M13.1219 6 3.85303 17.5765"/>
                    </svg>
                    <span class="sr-only">Subscript</span>
                </button>
                <div id="tooltip-subscript" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Toggle subscript
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleSuperscriptButton" data-tooltip-target="tooltip-superscript" type="button" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.0002 11h-4l-.0001-.5C18.099 9.46711 20.7502 8 20.7502 7V5.99989c0-.55228-.4478-.99989-1-.99989h-1.75c-.5523 0-1 .44772-1 1M5.37837 7.98274 14.6473 19.5593m-.5251-11.25583L4.85547 19.8773"/>
                    </svg>
                    <span class="sr-only">Superscript</span>
                </button>
                <div id="tooltip-superscript" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Toggle superscript
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleHighlightButton" data-tooltip-target="tooltip-highlight" type="button" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M9 19.2H5.5c-.3 0-.5-.2-.5-.5V16c0-.2.2-.4.5-.4h13c.3 0 .5.2.5.4v2.7c0 .3-.2.5-.5.5H18m-6-1 1.4 1.8h.2l1.4-1.7m-7-5.4L12 4c0-.1 0-.1 0 0l4 8.8m-6-2.7h4m-7 2.7h2.5m5 0H17"/>
                    </svg>
                    <span class="sr-only">Highlight</span>
                </button>
                <div id="tooltip-highlight" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Toggle highlight
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleCodeButton" type="button" data-tooltip-target="tooltip-code" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                    </svg>
                    <span class="sr-only">Code</span>
                </button>
                <div id="tooltip-code" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Format code
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleTextSizeButton" data-dropdown-toggle="textSizeDropdown" type="button" data-tooltip-target="tooltip-text-size" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6.2V5h11v1.2M8 5v14m-3 0h6m2-6.8V11h8v1.2M17 11v8m-1.5 0h3"/>
                    </svg>
                    <span class="sr-only">Text size</span>
                </button>
                <div id="tooltip-text-size" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Text size
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div id="textSizeDropdown" class="z-10 hidden w-72 rounded bg-white p-2 shadow dark:bg-gray-700">
                    <ul class="space-y-1 text-sm font-medium" aria-labelledby="toggleTextSizeButton">
                        <li>
                            <button data-text-size="16px" type="button" class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">16px (Default)
                            </button>
                        </li>
                        <li>
                            <button data-text-size="12px" type="button" class="flex justify-between items-center w-full text-xs rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">12px (Tiny)
                            </button>
                        </li>
                        <li>
                            <button data-text-size="14px" type="button" class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">14px (Small)
                            </button>
                        </li>
                        <li>
                            <button data-text-size="18px" type="button" class="flex justify-between items-center w-full text-lg rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">18px (Lead)
                            </button>
                        </li>
                        <li>
                            <button data-text-size="24px" type="button" class="flex justify-between items-center w-full text-2xl rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">24px (Large)
                            </button>
                        </li>
                        <li>
                            <button data-text-size="36px" type="button" class="flex justify-between items-center w-full text-4xl rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">36px (Huge)
                            </button>
                        </li>
                    </ul>
                </div>
                <button id="toggleTextColorButton" data-dropdown-toggle="textColorDropdown" type="button" data-tooltip-target="tooltip-text-color" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="none" viewBox="0 0 25 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6.532 15.982 1.573-4m-1.573 4h-1.1m1.1 0h1.65m-.077-4 2.725-6.93a.11.11 0 0 1 .204 0l2.725 6.93m-5.654 0H8.1m.006 0h5.654m0 0 .617 1.569m5.11 4.453c0 1.102-.854 1.996-1.908 1.996-1.053 0-1.907-.894-1.907-1.996 0-1.103 1.907-4.128 1.907-4.128s1.909 3.025 1.909 4.128Z"/>
                    </svg>
                    <span class="sr-only">Text color</span>
                </button>
                <div id="tooltip-text-color" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Text color
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div id="textColorDropdown" class="z-10 hidden w-48 rounded bg-white p-2 shadow dark:bg-gray-700">
                    <div class="grid grid-cols-6 gap-2 group mb-3 items-center p-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input type="color" id="color" value="#e66465" class="border-gray-200 border bg-gray-50 dark:bg-gray-700 dark:border-gray-600 rounded-md p-px px-1 hover:bg-gray-50 group-hover:bg-gray-50 dark:group-hover:bg-gray-700 w-full h-8 col-span-3" />
                        <label for="color" class="text-gray-500 dark:text-gray-400 text-sm font-medium col-span-3 group-hover:text-gray-900 dark:group-hover:text-white">Pick a color</label>
                    </div>
                    <div class="grid grid-cols-6 gap-1 mb-3">
                        <button type="button" data-hex-color="#1A56DB" style="background-color: #1A56DB" class="w-6 h-6 rounded-md"><span class="sr-only">Blue</span></button>
                        <button type="button" data-hex-color="#0E9F6E" style="background-color: #0E9F6E" class="w-6 h-6 rounded-md"><span class="sr-only">Green</span></button>
                        <button type="button" data-hex-color="#FACA15" style="background-color: #FACA15" class="w-6 h-6 rounded-md"><span class="sr-only">Yellow</span></button>
                        <button type="button" data-hex-color="#F05252" style="background-color: #F05252" class="w-6 h-6 rounded-md"><span class="sr-only">Red</span></button>
                        <button type="button" data-hex-color="#FF8A4C" style="background-color: #FF8A4C" class="w-6 h-6 rounded-md"><span class="sr-only">Orange</span></button>
                        <button type="button" data-hex-color="#0694A2" style="background-color: #0694A2" class="w-6 h-6 rounded-md"><span class="sr-only">Teal</span></button>
                        <button type="button" data-hex-color="#B4C6FC" style="background-color: #B4C6FC" class="w-6 h-6 rounded-md"><span class="sr-only">Light indigo</span></button>
                        <button type="button" data-hex-color="#8DA2FB" style="background-color: #8DA2FB" class="w-6 h-6 rounded-md"><span class="sr-only">Indigo</span></button>
                        <button type="button" data-hex-color="#5145CD" style="background-color: #5145CD" class="w-6 h-6 rounded-md"><span class="sr-only">Purple</span></button>
                        <button type="button" data-hex-color="#771D1D" style="background-color: #771D1D" class="w-6 h-6 rounded-md"><span class="sr-only">Brown</span></button>
                        <button type="button" data-hex-color="#FCD9BD" style="background-color: #FCD9BD" class="w-6 h-6 rounded-md"><span class="sr-only">Light orange</span></button>
                        <button type="button" data-hex-color="#99154B" style="background-color: #99154B" class="w-6 h-6 rounded-md"><span class="sr-only">Bordo</span></button>
                        <button type="button" data-hex-color="#7E3AF2" style="background-color: #7E3AF2" class="w-6 h-6 rounded-md"><span class="sr-only">Dark Purple</span></button>
                        <button type="button" data-hex-color="#CABFFD" style="background-color: #CABFFD" class="w-6 h-6 rounded-md"><span class="sr-only">Light</span></button>
                        <button type="button" data-hex-color="#D61F69" style="background-color: #D61F69" class="w-6 h-6 rounded-md"><span class="sr-only">Dark Pink</span></button>
                        <button type="button" data-hex-color="#F8B4D9" style="background-color: #F8B4D9" class="w-6 h-6 rounded-md"><span class="sr-only">Pink</span></button>
                        <button type="button" data-hex-color="#F6C196" style="background-color: #F6C196" class="w-6 h-6 rounded-md"><span class="sr-only">Cream</span></button>
                        <button type="button" data-hex-color="#A4CAFE" style="background-color: #A4CAFE" class="w-6 h-6 rounded-md"><span class="sr-only">Light Blue</span></button>
                        <button type="button" data-hex-color="#5145CD" style="background-color: #5145CD" class="w-6 h-6 rounded-md"><span class="sr-only">Dark Blue</span></button>
                        <button type="button" data-hex-color="#B43403" style="background-color: #B43403" class="w-6 h-6 rounded-md"><span class="sr-only">Orange Brown</span></button>
                        <button type="button" data-hex-color="#FCE96A" style="background-color: #FCE96A" class="w-6 h-6 rounded-md"><span class="sr-only">Light Yellow</span></button>
                        <button type="button" data-hex-color="#1E429F" style="background-color: #1E429F" class="w-6 h-6 rounded-md"><span class="sr-only">Navy Blue</span></button>
                        <button type="button" data-hex-color="#768FFD" style="background-color: #768FFD" class="w-6 h-6 rounded-md"><span class="sr-only">Light Purple</span></button>
                        <button type="button" data-hex-color="#BCF0DA" style="background-color: #BCF0DA" class="w-6 h-6 rounded-md"><span class="sr-only">Light Green</span></button>
                        <button type="button" data-hex-color="#EBF5FF" style="background-color: #EBF5FF" class="w-6 h-6 rounded-md"><span class="sr-only">Sky Blue</span></button>
                        <button type="button" data-hex-color="#16BDCA" style="background-color: #16BDCA" class="w-6 h-6 rounded-md"><span class="sr-only">Cyan</span></button>
                        <button type="button" data-hex-color="#E74694" style="background-color: #E74694" class="w-6 h-6 rounded-md"><span class="sr-only">Pink</span></button>
                        <button type="button" data-hex-color="#83B0ED" style="background-color: #83B0ED" class="w-6 h-6 rounded-md"><span class="sr-only">Darker Sky Blue</span></button>
                        <button type="button" data-hex-color="#03543F" style="background-color: #03543F" class="w-6 h-6 rounded-md"><span class="sr-only">Forest Green</span></button>
                        <button type="button" data-hex-color="#111928" style="background-color: #111928" class="w-6 h-6 rounded-md"><span class="sr-only">Black</span></button>
                        <button type="button" data-hex-color="#4B5563" style="background-color: #4B5563" class="w-6 h-6 rounded-md"><span class="sr-only">Stone</span></button>
                        <button type="button" data-hex-color="#6B7280" style="background-color: #6B7280" class="w-6 h-6 rounded-md"><span class="sr-only">Gray</span></button>
                        <button type="button" data-hex-color="#D1D5DB" style="background-color: #D1D5DB" class="w-6 h-6 rounded-md"><span class="sr-only">Light Gray</span></button>
                        <button type="button" data-hex-color="#F3F4F6" style="background-color: #F3F4F6" class="w-6 h-6 rounded-md"><span class="sr-only">Cloud Gray</span></button>
                        <button type="button" data-hex-color="#F3F4F6" style="background-color: #F3F4F6" class="w-6 h-6 rounded-md"><span class="sr-only">Cloud Gray</span></button>
                        <button type="button" data-hex-color="#F9FAFB" style="background-color: #F9FAFB" class="w-6 h-6 rounded-md"><span class="sr-only">Heaven Gray</span></button>
                    </div>
                    <button type="button" id="reset-color" class="py-1.5 text-sm font-medium text-gray-500 focus:outline-none bg-white rounded-lg hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-700 dark:text-gray-400 dark:hover:text-white w-full dark:hover:bg-gray-600">Reset color</button>
                </div>
                <button id="toggleFontFamilyButton" data-dropdown-toggle="fontFamilyDropdown" type="button" data-tooltip-target="tooltip-font-family" class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10.6 19 4.298-10.93a.11.11 0 0 1 .204 0L19.4 19m-8.8 0H9.5m1.1 0h1.65m7.15 0h-1.65m1.65 0h1.1m-7.7-3.985h4.4M3.021 16l1.567-3.985m0 0L7.32 5.07a.11.11 0 0 1 .205 0l2.503 6.945h-5.44Z"/>
                    </svg>
                    <span class="sr-only">Font family</span>
                </button>
                <div id="tooltip-font-family" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Font Family
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div id="fontFamilyDropdown" class="z-10 hidden w-48 rounded bg-white p-2 shadow dark:bg-gray-700">
                    <ul class="space-y-1 text-sm font-medium" aria-labelledby="toggleFontFamilyButton">
                        <li>
                            <button data-font-family="Inter, ui-sans-serif" type="button" class="flex justify-between items-center w-full text-sm font-sans rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Default
                            </button>
                        </li>
                        <li>
                            <button data-font-family="Arial, sans-serif" type="button" class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white" style="font-family: Arial, sans-serif;">Arial
                            </button>
                        </li>
                        <li>
                            <button data-font-family="'Courier New', monospace" type="button" class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white" style="font-family: 'Courier New', monospace;">Courier New
                            </button>
                        </li>
                        <li>
                            <button data-font-family="Georgia, serif" type="button" class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white" style="font-family: Georgia, serif;">Georgia
                            </button>
                        </li>
                        <li>
                            <button data-font-family="'Lucida Sans Unicode', sans-serif" type="button" class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white" style="font-family: 'Lucida Sans Unicode', sans-serif;">Lucida Sans Unicode
                            </button>
                        </li>
                        <li>
                            <button data-font-family="Tahoma, sans-serif" type="button" class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white" style="font-family: Tahoma, sans-serif;">Tahoma
                            </button>
                        </li>
                        <li>
                            <button data-font-family="'Times New Roman', serif;" type="button" class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white" style="font-family: 'Times New Roman', serif;">Times New Roman
                            </button>
                        </li>
                        <li>
                            <button data-font-family="'Trebuchet MS', sans-serif" type="button" class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white" style="font-family: 'Trebuchet MS', sans-serif;">Trebuchet MS
                            </button>
                        </li>
                        <li>
                            <button data-font-family="Verdana, sans-serif" type="button" class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white" style="font-family: Verdana, sans-serif;">Verdana
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
        <label for="wysiwyg-text-example" class=" ">Write comment
            Write comment
            Write comment
            Write commentWrite comment

        </label>
        <div id="wysiwyg-text-example" class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400">
            Write comment
            Write comment
            Write comment
            Write comment
            Write comment
        </div>
    </div>
</div>