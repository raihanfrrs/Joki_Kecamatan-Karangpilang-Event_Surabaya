<div class="pagetitle">
    <h1>
      @if (count(Request::segments()) == 0)
          Dashboard
      @else 
          {{ isset($title) ? $title : Str::ucfirst(Request::segment(1)) }}
      @endif
    </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item @if(request()->root() === url()->current()) active @endif">
            <a href="/">Dashboard</a>
        </li>
        @if (count(Request::segments()) >= 1)
          @if (request()->is(Request::segment(1)."/*"))
          <li class="breadcrumb-item" aria-current="page">
              <a href="{{ url()->previous() }}">{{ Str::ucfirst(Request::segment(1)) }}</a>
          </li>
          @endif
        <li class="breadcrumb-item @if(request()->segment(count(request()->segments()))) active @endif" aria-current="page">
            <a href="{{ url()->current() }}">
                {{ isset($subtitle) ? Str::ucfirst($subtitle) : Str::ucfirst(request()->segment(count(request()->segments()))) }}
            </a>
        </li>
        @endif
    </ol>
    </nav>
</div>