<div class="mt-5">
    <div class="p-2.5 text-sm hadow-lg rounded-sm border border-gray-200 bg-white shadow text-gray-800">
        <div class="p-4">
            <div class="pb-3">
                <p class="text-lg font-semibold block pb-2">{{$item->name}}</p>
                <p>{{$item->comment}}</p>
            </div>
            <hr class="mb-3 h-px bg-gray-200 border-0 dark:bg-gray-700">

            <div class="w-full">
                <a href="{{route('todo.create')}}" class="t-3">
                    <image src="{{asset('images/post_edit_black.svg')}}" class="w-5 h-5 inline-block"/>
                    일정 수정하기
                </a>
                <span class="float-right">
                    시작일 : {{$item->started_at}} / 주기 {{$item->cycle}}일
                </span>
            </div>
        </div>
    </div>
</div>
