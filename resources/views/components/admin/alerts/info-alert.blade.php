<div class="flex w-96 shadow-lg rounded-lg absolute right-2 top-2">
    <div class="bg-blue-500 py-4 px-6 rounded-l-lg flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm6.5-.25A.75.75 0 017.25 7h1a.75.75 0 01.75.75v2.75h.25a.75.75 0 010 1.5h-2a.75.75 0 010-1.5h.25v-2h-.25a.75.75 0 01-.75-.75zM8 6a1 1 0 100-2 1 1 0 000 2z"></path></svg>
    </div>
    <div class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
        <div>{{$slot}}</div>
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path></svg>
        </button>
    </div>
</div>
