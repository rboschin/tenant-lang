@php
    $locales = \LaravelLang\NativeLocaleNames\LocaleNames::get();
//    $activeLocale = config('app.locale');
    $installedLocales = \LaravelLang\Locales\Facades\Locales::installed();
@endphp
<script>
    function selectOpenUrl(selectId) {
        d = document.getElementById(selectId).value;
        if (d) {
            location.href='{{ route('locale.set')}}/'+d;
        }
    }
</script>

<div class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
    <select class="ml-4 rounded-sm" name="locale" id="chooseLocale" onchange="selectOpenUrl(this.id);">
        <option value=""></option>
        @foreach($installedLocales as $lang)
            <option value="{{ $lang->code }}">{{ $lang->native }}</option>
        @endforeach
    </select>
</div>
