@props(['comment'])
<article
class="flex bg-gray-50 p-6 border border-gray-200 p-6 rounded-xl space-x-4">
<div class="flex-shrink-0">
    <img src="https:/i.pravatar.cc/60?id={{$comment->user_id}}" alt="Avatar"
        width="60" height="60" class="rounded-xl">
</div>
<div>
    <header class="mb-2">
        <h3 class="font-bold">{{$comment->author->username}}</h3>
        <p class="text-xs">Posted <time>{{$comment->created_at->diffForHumans()}}</time>
        </p>
    </header>
    <p>{{$comment->body}}</p>
</div>
</article>
