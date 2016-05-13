<div class="">
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <!-- if there are creation errors, they will show here -->
    @if ( $errors->count() > 0 )
    <div class="alert alert-danger">
        {{ HTML::ul($errors->all()) }}
    </div>
    @endif
</div>