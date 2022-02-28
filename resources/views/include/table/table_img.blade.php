<div> 
 <td class=" p-3 bg-white text-sm">
     <div class="flex-shrink-0 w-10 h-10">
          @if($row->bg_img)                      
            <a href="{{ $row->bg_img->getUrl('preview_thumbnail') }}" target="_blank" style="display: inline-block">
                  <img class="w-10 h-10 rounded-full"src="{{ $row->bg_img->getUrl('preview_thumbnail') }}" alt="{{ $row->bg_img->name }}" >
            
            </a> 
      @else
      <a href="#" target="_blank" style="display: inline-block">
          <img class="w-10 h-10 rounded-full" src="https://source.unsplash.com/user/erondu"
                                        alt="admin dashboard ui">
      </a> 
      @endif                            
  </div>
 </td>
</div> 