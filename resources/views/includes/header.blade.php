
<header>
    <nav class="navbar navbar-dark bg-primary" style="align-items: center">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('dashboard') }}"style="color: white">Facebook</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                <li>
                    <input class="search" style="border: 0ch" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </li>

                <li><a href="{{ route('logout') }}" style="color: white">Logout</a></li>

                <li><a href="{{ route('account') }}" style="color: white">Account</a></li>
                {{-- @if (Auth::user())
                <li>
                    @if (Storage::disk('local')->has($user->name . '-' . $user->id . '.jpg'))
                    <section class="row new-post">
                        <div class="col-md-6 col-md-offset-3">
                            <img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg'] ) }}" style="height: 6.5ex ">
                        </div>
                    </section>
                    @endif
                @else
                    <img src="https://i.pravatar.cc/100" style="height: 6.5ex" >
                </li>
                @endif --}}
            </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
