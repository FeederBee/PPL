<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ke The Lie | Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
</head>
<body>

<nav class="navbar navbar-light bg-success">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
          <img src="{{ asset('/images/ke the lie.png')}}" alt="Logo" width="60" height="55" />
        </a>
        <div class="btn-group dropstart">
          <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('/icons/person-circle-outline.svg')}}" class="object-fit-cover" alt="..." width="40" height="35" />
          </button>
          <ul class="dropdown-menu bg-dark-subtle" style="top: 50px; right: -10px">
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    
  <div  class="position-absolute shadow p-3 mb-5 rounded" style="top:110px; left:30px;">
    <a href="{{ route('owners.index') }}" class="btn btn-outline-success">
      < Back
    </a>
  </div>

<div class="content  mt-4">
  <div class="container">
    <div class="card">
      <div class="row g-0">
        <div class="col-12 col-lg-5 col-xl-3 border-right ps-2 pe-2">
          <div class="px-4 d-none d-md-block">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1 p-4 pb-0">
                <h4> Daftar Kontak </h4>
              </div>
            </div>
          </div>
          <hr>
          @if ($temans->count() > 0)
          @foreach ($temans as $user)
          <div class="justify-center mb-2 me-3">
            <a id="button" href="{{ route('messages.show', $user->id_teman_user) }}" class="btn btn-outline-success border border-2 rounded" style="width:260px">
              <div class="d-flex align-items-start m-1 mt-2 mb-1 me-3">
                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mb-1" alt="Vanessa Tucker" width="40" height="40">
                <div class="flex-grow-1 ms-3 text-start">
                  {{ $user->nama }}
                </div>
              </div>
            </a>
          </div>
        @endforeach
        @endif
        </div>

        <div class="col-12 col-lg-7 col-xl-9 border border-1 border-success p-2" style="height:550px" >
          <div class="border-bottom d-none d-lg-block border border-1 border-success shadow">
            <div class="d-flex align-items-center p-2 ">
              <div class="position-relative">
                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="foto" width="40" height="40">
              </div>
              <div class="flex-grow-1 ps-3 pe-3">
                <strong>{{ $penerima }}</strong>
                <div class="text-muted small"><em></em></div>
              </div>
            </div>
          </div>
          <div class="py-3 px-4 border-top position-absolute" style="top:480px; width:835px">
            <div class="input-group">
              <form method="post" class="input-group" action="{{ route('messages.store', $user->id_teman_user) }}">
                @csrf
                <input type="text" name="message" class="form-control" placeholder="Ketik pesan Anda">
                <button class="btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
  
      <!-- Pesan -->
      <div class="position-absolute" style="width:830px; top:75px; left:270px ; max-height: 400px;
    overflow-y: scroll;">
        <div class="position-relative">
          <div class="chat-messages p-4" style="display: flex; flex-direction: column;">
              @foreach ($messages as $message)
              @if ($message->user_id==$sender->id)
              <div class="chat-message-right pb-4 flex" 
              style="display: flex; flex-shrink: 0; flex-direction: row-reverse; margin-left: auto;">
                <div>
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                  <div class="text-muted small text-nowrap mt-2">{{ $message->created_at->format('H:i') }}</div>
                </div>
                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                  <div class="text-bold mb-1 border-bottom text-success">{{ $sender->nama }}</div>
                  {{ $message->message }}
                </div>
              </div>
              @else
              <div class="chat-message-left pb-4 flex" 
              style="display: flex; flex-shrink: 0; margin-right: auto;">
                <div>
                  <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                  <div class="text-muted small text-nowrap mt-2"> {{ $message->created_at->format('H:i') }}</div>
                </div>
                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                  <div class="text-bold mb-1 border-bottom text-success">{{ $message->user->nama }}</div>
                  <p>{{ $message->message }}</p>
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
    var button = document.getElementById('button');

    button.addEventListener('click', function() {
        if (button.classList.contains('active')) {
            button.classList.remove('active');
        } else {
            button.classList.add('active');
        }
    });
    document.addEventListener('click', function(event) {
        var target = event.target;
        if (button !== teman && !button.contains(target)) {
            button.classList.remove('active');
        }
    });
  </script>
  </body>
</html>

