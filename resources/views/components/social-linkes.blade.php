<div>
<ul class="footer-social">
            @if($sett ->facebook !== null)
				<li><a href="{{ $sett->facebook }}"target='_blank' class="facebook"><i class="fa fa-facebook"></i></a></li>
                @endIf
                @if($sett->twitter !== null)
                <li><a href="{{$sett->twitter}}"target='_blank' class="twitter"><i class="fa fa-twitter"></i></a></li>
				@endIf
                @if($sett->instegram !== null)
                <li><a href="{{$sett->instagram}}"target='_blank' class="instagram"><i class="fa fa-instagram"></i></a></li>
				@endIf
                
                   <li><a href="#"target='_blank' class="youtube"><i class="fa fa-youtube"></i></a></li>
				
                @if($sett->linkedin !== null)
                <li><a href="{{$sett->linkedin}}" target='_blank' class="linkedin"><i class="fa fa-linkedin"></i></a></li>
			    @endIf
            </ul>
</div>