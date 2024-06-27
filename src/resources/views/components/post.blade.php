@props(['post' => ''])
@if(empty($post))
<div class="flex flex-col">
    <div class="flex-1 flex-row items-center space-x-2 mb-3 ">
        <p class="text-center">Opsss there is nothing here! Create your first post </p>
    </div>
</div>
@else
<article>
    {{ $attributes }}
    <div class="flex flex-col">
        <div class="flex flex-row items-center space-x-2 mb-3">
            <div>
                <img src="{{ Vite::asset('resources/images/people-1.jpeg') }}"
                    class="w-14 h-14 border-2  rounded-full" alt="">
            </div>
            <div class="flex flex-col space-y-2">
                <p class=" text-xs text-black text-[15px]"> <b>{{ $post->Employee->user_name }}</b> </p>
                <div class='has-tooltip'>
                    <span class='tooltip rounded text-[11px] p-1 bg-gray-100 text-black -mt-8'>{{ $post->created_at }}</span>
                    <p class=" text-xs text-slate-500 "> {{ $post->created_at->diffForHumans()}} </p>
                  </div>
            </div>
        </div>
        <div class="flex-col space-y-3">
            <div class="flex-1  mb-2">
                <p class="text-sm "> {{ $post->content}} </p>
            </div>
            <div
                class="grid  sm:grid-col-2 md:grid-col-2 lg:grid-rows-auto xl:grid-flow-col xl:grid-rows-auto gap-4 justify-center">
                @foreach($post->Picture as $i)
                <div class="">
                    <img class=" rounded-lg transition-all duration-300 "
                        src="{{ asset('storage/'. $i->url) }}"
                        alt="" width="200" height="100">
                </div>
                @endforeach
                {{-- <div class="">
                    <img class=" rounded-lg transition-all duration-300"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                        alt="">
                </div>
                <div class="">
                    <img class=" rounded-lg transition-all duration-300"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                        alt="">
                </div>
                <div class="">
                    <img class=" rounded-lg transition-all duration-300"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                        alt="">
                </div> --}}

            </div>
        </div>
        
        <section class=" mt-3 ">
            <hr>
            @foreach($post->Comment as $a_comment)
            <div class="flex flex-col bg-gray-600 mt-3 mb-3 px-3  py-2 rounded">
                <div class="flex flex-row items-center  space-x-2">
    
                    <div class="flex">
                        <img src="{{ Vite::asset('resources/images/people-1.jpeg') }}"
                            class="w-12 h-12   rounded-full" alt="">
                    </div>
                    <div class="flex-1 flex-col space-y-[6px]">
    
                        <p class="flex-none text-sm text-white "> <b>{{ $a_comment->Employee->user_name }} </b></p>
    
                        <div class='has-tooltip'>
                            <span class='tooltip rounded text-[11px] p-1 bg-gray-100 text-black -mt-8'>{{ $a_comment->created_at }}</span>
                            <p class=" text-xs text-white italic text-[11px]"> {{ $a_comment->created_at->diffForHumans()}} </p>
                          </div>
    
    
                    </div>
                </div>
                <div class="mt-3 mb-3">
                    <p class="bg-gray-300 text-xs px-2 py-2 rounded ">{{ $a_comment->comment }}</p>
                </div>
            </div>
            @endforeach
    
        </section>
        


        <footer class="mt-3">
            <form method="POST" action="/comment">
                @csrf
                <label for="comment"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">comment</label>
                <div class="relative">
                    <div
                        class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-[18px] h-[18px] text-gray-800 dark:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 18">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z">
                            </path>
                        </svg>
                    </div>
                    <input hidden type="text" name="post_id" id="post_id" value="{{ $post->id }}">
                    <input type="comment" id="comment" name="comment"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-black focus:border-black bg-gray-200 border-gray-300 placeholder-gray-400 text-black focus:ring-black focus:border-black"
                        placeholder="post your comment" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Comment</button>
                </div>
            </form>
        </footer>

    </div>
</article>
@endif
