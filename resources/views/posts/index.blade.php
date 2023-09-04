<x-app-layout>

    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url(@if ($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2017/02/08/17/24/fantasy-2049567_640.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div>
                            @foreach ($post->tags as $tag)
                                @php
                                    $colorClasses = [
                                        'red' => 'bg-red-600',
                                        'yellow' => 'bg-yellow-600',
                                        'green' => 'bg-green-600',
                                        'blue' => 'bg-blue-600',
                                        'indigo' => 'bg-indigo-600',
                                        'pink' => 'bg-pink-600',
                                        'purple' => 'bg-purple-600',
                                    ];
                                    $colorClass = isset($colorClasses[$tag->color]) ? $colorClasses[$tag->color] : '';
                                @endphp

                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 {{ $colorClass }} text-white rounded-full">{{ $tag->name }}</a>

                                {{-- <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-950 text-white rounded-full">{{$tag->name}}</a> --}}
                                {{-- <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{!!$tag->color!!}-950 text-white rounded-full">{{$tag->name}}</a> --}}
                                {{-- <a href="" class="inline-block px-3 h-6 {{'bg-' . $tag->color . '-950'}} text-white rounded-full">{{$tag->name}}</a> --}}
                            @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>

</x-app-layout>
