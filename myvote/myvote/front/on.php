<table style="text-align:center;align-items:center;" class="table table-hover ">
<tr style="height:10vh">
<td style="height:10vh" ></td></tr>  
<tr>


        <td style="width:20%;">
            <h3>投票期限</h3>
        </td>
        <td style="width:60%;">
        <h3>主題</h3>
        </td>
        <td style="width:20%;">
        <h3>已投票人數</h3>
            
        </td>
        </tr>
        <tr>
    
		<div id="result">
			
		</div>
		
</tr>
    <tr>
        <td>
            <div class="demo-box">DEMO BOX

            </div>
        </td><
    </tr>
</table>

<script>
    let page=4;
      const intersectionObserver = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      $("#result").load("./modal/on.php?page="+page);
      
      page=page+4;
      
      
    } 
  });
  
  intersectionObserver.observe(document.querySelector('.demo-box'));
    </script>