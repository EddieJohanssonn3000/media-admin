{{-- Visar felmeddelande med ikon + text (inte bara färg) --}}
@if($errors->has($field))
    <p role="alert" class="error-message">
        <span aria-hidden="true">⚠</span> {{ $errors->first($field) }}
    </p>
@endif