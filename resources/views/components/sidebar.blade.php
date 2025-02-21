<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full bg-brand-darkest dark:bg-gray-800">
    <ul class="space-y-2">
        <li>
        <a
            href="{{ route('dashboard') }}"
            class="flex items-center p-2 text-base font-medium text-white rounded-lg dark:text-white hover:bg-brand-dark dark:hover:bg-gray-700 group"
        >
            <svg
            aria-hidden="true"
            class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
            >
            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
            <span class="ml-3">Dashboard</span>
        </a>
        </li>
        <li>
        <button
            type="button"
            class="flex items-center p-2 w-full text-base font-medium text-white rounded-lg transition duration-75 group hover:bg-brand-dark dark:text-white dark:hover:bg-gray-700"
            aria-controls="dropdown-pages"
            data-collapse-toggle="dropdown-pages"
        >
            <svg
            aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
            >
            <path
                fill-rule="evenodd"
                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                clip-rule="evenodd"
            ></path>
            </svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap"
            >Emergency Quota</span
            >
            <svg
            aria-hidden="true"
            class="w-6 h-6"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
            >
            <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"
            ></path>
            </svg>
        </button>
        <ul id="dropdown-pages" class="hidden py-2 space-y-2">
            <li>
            <a
                href="{{ route('eqrequest.create') }}"
                onclick="this.closest('form').submit(); return false;"
                class="flex items-center p-2 pl-11 w-full text-base font-medium text-white rounded-lg transition duration-75 group hover:bg-brand-dark dark:text-white dark:hover:bg-gray-700"
                >Create</a
            >
            </li>
            <li>
            <a
                href="{{ route('eqrequest.index') }}"
                onclick="this.closest('form').submit(); return false;"
                class="flex items-center p-2 pl-11 w-full text-base font-medium text-white rounded-lg transition duration-75 group hover:bg-brand-dark dark:text-white dark:hover:bg-gray-700"
                >Edit/Delete/Forward</a
            >
            </li>
        </ul>
        </li>
        <li>
        <a
            href="#"
            class="flex items-center p-2 text-base font-medium text-white rounded-lg dark:text-white hover:bg-brand-dark dark:hover:bg-gray-700 group"
        >
            <svg
            aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
            >
            <path
                d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
            ></path>
            <path
                d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
            ></path>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Messages</span>
            <span
            class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800"
            >
            4
            </span>
        </a>
        </li>
        <li>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a
                href="#"
                class="flex items-center p-2 text-base font-medium text-white rounded-lg dark:text-white hover:bg-brand-dark dark:hover:bg-gray-700 group"
                onclick="this.closest('form').submit();return false;">
                <svg
                aria-hidden="true"
                class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                </svg>
                <span class="ml-3">Logout</span>
            </a>
        </form>
        </li>
    </ul>
   </div>
</aside>