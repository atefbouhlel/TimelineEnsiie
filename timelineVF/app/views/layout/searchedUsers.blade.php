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