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
                                    <th width="352" align="left">Name</th>
                                    <th width="174" >Type</th>
                                    <th width="246" >Show ID</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                              
                                <tr>                                    
                                    <td  align="left">A ring</td>
                                    <td >ring A</td>
                                    <td >RD115599</td>
                                    <td >
                                      	<span class="tip" >
                                          	<a  title="Edit" href="" >
                                              <img src="images/icon/icon_edit.png" >
                                          	</a>
                                      	</span> 
                                      	<span class="tip" href="" >
                                         	<a id="1" class="Delete"  name="Band ring" title="Delete"  >
                                            	<img src="images/icon/icon_delete.png" >
                                          	</a>
                                      	</span> 
                                    </td>
                                  </tr>

                                </tbody>
                              </table>


					</div>
					</div>

<!-- // End onecolumn -->

<div class="clear"></div>
@include('layout.footer')