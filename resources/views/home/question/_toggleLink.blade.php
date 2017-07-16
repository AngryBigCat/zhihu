<a href="javascript:void(0);" data-module="{{ $module or '' }}" data-id="{{ $id }}">
    <span class="{{ $faIcon or '' }}"></span> {{ $text }}
</a>
<span style="display: none;color: #ccc;">
    <span class="fa fa-spinner fa-spin"></span> {{ $text }}
</span>