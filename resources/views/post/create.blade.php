<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿の新規作成
        </h2>
        <x-message :message="session('message')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </x-slot>
    
        {{-- 最初に作成した部分 --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
                <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                        <label for="body" class="font-semibold leading-none mt-4">件名</label>
                        <input type="text" name="title" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" value="{{old('title')}}" placeholder="Enter Title">
                        </div>
                    </div>
    
                    <div class="w-full flex flex-col">
                        <label for="body" class="font-semibold leading-none mt-4">本文</label>
                        <textarea name="body" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                    </div>
    
                    <div class="w-full flex flex-col">
                        <label for="image" class="font-semibold leading-none mt-4">画像 </label>
                        <div>
                        <input id="image" type="file" name="image">
                        </div>
                    </div>
                    <br>
                    <x-button type="submit" tyclass="mt-4">
                        送信する
                    </x-button>

                    <button type="button" onclick="onClickPreview(this)">プレビューを見る</button>
                </form>
                <script type="text/javascript">
                    const onClickPreview = (button) => {
                        
                     button.form.action = '/post/preview'
                     button.form.target = '_blank'
                     button.form.submit()
                   }
               </script>
            </div>
        </div>
        {{-- 最初に作成した部分ここまで --}}

</x-app-layout>