<div class="box blue">
    <div class="heading">My Online Friends</div>
    <div class="content">
        @forelse($friends as $row)
            @if($row->habbo->online == 1)
            <span class="friend"><a href="{{ route('home', [$row->habbo->username]) }}">{{$row->habbo->username}}</a></span>
            @endif
            @empty
            <span class="text-center full">You have no friends online</span>
        @endforelse
    </div>
</div>
      