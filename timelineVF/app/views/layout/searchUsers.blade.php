@include('layout.header')
<div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Liste des étudiants </span>
                    <form><input type="text" class="searchUsers" placeholder="Chercher .." id="keywords"></form>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >

                              <table class="display static " id="static">
                                <thead>
                                  <tr>
                                    <th width="352" align="left">Nom</th>
                                    <th width="174" >Email</th>
                                    <th width="246" >Promotion</th>
                                    @if(Session::get('user')->isAdmin==1)
                                    <th width="199" >Supprimer</th>
                                    @endif
                                  </tr>
                                </thead>
                                <tbody>
                              @foreach($users as $user)
                                <tr>                                    
                                    <td  align="left"><a href="{{URL::to('user/'.$user->id)}}"> {{$user->firstname}} {{$user->name}}</a></td>
                                    <td >{{$user->email}}</td>
                                    <td >{{$user->promo}}</td>
                                    @if(Session::get('user')->isAdmin==1)
                                    <td > 
                                      	<span class="tip"  >
                                         	<a  href="{{URL::to('deleteUser/'.$user->id)}}" class="Delete"  name="Band ring" title="Delete"  >
                                            	<img src="{{URL::asset('images/icon/icon_delete.png')}}" >
                                          	</a>
                                      	</span> 
                                    </td>
                                    @endif
                                  </tr>
                              @endforeach
                                </tbody>
                              </table>


					</div>
					</div>

<!-- // End onecolumn -->

<div class="clear"></div>
@include('layout.footer')