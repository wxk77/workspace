 /**
     * fetch list of Reply
     * @param $index
     */
   public function getReplyList($tugou_id)
   {
       $result= $this->api->GetTuGouReplyList($tugou_id, $page = array());
       if (FALSE === $result OR isset($result['error'])) {
           return;
       }
       $reply=$result['TGReplyInfoList'];
       $len=strlen($reply['Gname']);
       if($len<10){
           return $reply['Gname'];

        }else{
           return substr($reply['Gname'],0,9).'...';

       };
       $this->load->view(array('reply'=>$reply));

   }
















    <?php foreach($reply as $item): ?>
                <div class="rep_img"><img src="<?php echo $item['GImage']?>" /><img src="/public/images/accept.png" id="accept" /></div>

                <div class="rep_nav">
                    <div class="one">
                        <ul class="rep-ulone">
                            <li>
                                <a href="#"><img src="/public/images/map.png" /><span>导航</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="/public/images/tel.png" /><span>电话</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="/public/images/mail.png" /><span>寻聊</span></a>
                            </li>
                        </ul>
                        <a href="#" class="switch"><img src="/public/images/delete.png" /></a>
                    </div>
                    <div class="two">
                        <ul class="rep_ultwo">
                            <li>
                                <a href="#"><img src="<?=$item['SImage']?>" class="huifu-img" /></a>
                            </li>
                            <li>
<!--                               <a href="#">-->
                                <a href="#">
                                          <span>
                                              <label><?=$item['GName']?></label>
                                                <label><?=$item['SName']?></label>
                                            </span>
                                    <img src="/public/images/huifu-mail.png" class="huifu-mail" style="display:none;" />
                                    <p class="huifu-bi"><img src="/public/images/huifu-bi.png" /><span>比图</span></p>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="switch2"><img src="/public/images/back.png" /></a>
                        <img src="/public/images/accept2.png" class="accept2" />
                    </div>
                </div>
                <?php endforeach; ?>

























                    <div class="one"> <ul class="rep-ulone"> <li>  </li>  <li>    </li><li>  </li> </ul></div>
                    <div class="two">   <ul class="rep_ultwo">  <li><a href="#"></a>  </li> <li><a href="#"> <span><label></label> <label></label></span>  <p class="huifu-bi"><span></span></p> </a> </li></ul><a href="#" class="switch2"></a></div></div><div class="rep_nav"><div class="one"> <ul class="rep-ulone">
                    <li><a href="#"><span></span></a> </li> <li>  <a href="#"><span></span></a> </li><li> <a href="#"><span></span></a></li> </ul><a href="#" class="switch"></a></div>
                    
                           
                           
                                
                     
                            function getData2(index){
    $.ajax({
      type:"post",
      data:{
        index:index
      },
      url:"/tugou/search/" + index,
      async:true,
      dataType:"json",
      success:function(data){
        for(var i=0;i<data.length;i++){
          var odiv=document.createElement("div");
          odiv.className="tab";
          odiv.innerHTML='数据拼接';
          oTab.appendChild(odiv);
          oLoading.style.display=oDiv.style.display="none";
        }
        s=false;
      },
      error:function(){
        console.log("error");
      }
    });
  }
                              
                          
                       
                       
                    
                   
                      
                          
                           
                           
                                
                                         
                                              
                                               
                                            
                                   
                                  
                               
                           
                        
                        
                       
                    
                
                        
                           
                                
                                    
                               
                               
                                  
                               
                                
                                   
                                
                           
                            
                        
                       
                            
                               
                                   
                                
                               
                                    
                                         
                                              
                                                
                                            
                                       
                                       
                                    
                                
                            
                           
                           
                        
                    </div>