@set($images, \PublicGallery::images($gallery_slug))
@if($images->count())
    <ul>
        @foreach($images as $image)
            @if($image->ExistOnDisk)
                <li>
                    <img src="{{ $image->AssetPath }}" alt="{{ $image->alt }}" title="{{ $image->title }}"/>
                </li>
            @endif
        @endforeach
    </ul>
@endif