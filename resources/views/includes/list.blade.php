<div class="list rounded border border-dark p-3">
    @foreach ($users as $user)
        @if ($user->id != auth()->user()->id)
            {{-- @if ($user->id != Auth::user()->id) --}}
            <div class="row m-md-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-inline p-3">
                            {{-- <img src="../images/web.jpg" alt=""> --}}
                            
                            <form action="" method="get">
                                @csrf
                                <div class="form-group d-inline-block">
                                    <img src="{{ asset('images/' . $user->avatar) }}" alt="" class="mr-md-4 img-fluid">
                                </div>
                                <div class="form-group d-inline-block ">
                                    <span class="my-auto"><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->first_name . " " . $user->last_name }}</a></span>
                                </div>
                                <div class="form-group d-inline-block float-right mx-auto">
                                    {{-- <button type="submit" class="btn btn-danger text-right">Unfollow</button> --}}
                                    {{-- {{ 
                                        $btnColor = "btn-primary";
                                        $followStatus = "Follow";
                                        $path = "follow";
                                        $user = auth()->user()->followedUsers();
                                        if(!empty($user)){
                                            
                                        } 
                                    }}
                                    <a href="{{ route('users.' . $path, ['followed_id' => $user->id]) }}" class="btn {{ $btnColor }}">{{ $followStatus }}</a> --}}
                                    @if (auth()->user()->isFollowing($user->id))
                                        <a href="{{ route('users.unfollow', ['followed_id' => $user->id]) }}" class="btn btn-danger">Unfollow</a>
                                    @else
                                        <a href="{{ route('users.follow', ['followed_id' => $user->id]) }}" class="btn btn-primary">Follow</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>      
        @endif
    @endforeach
</div>