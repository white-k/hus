var id=0;//全局变量
window.onload=function(){
	var customer=prompt("请输入昵称");

	var messBox=document.getElementsByTagName("textarea")[0];
	var text=messBox.value;
	

	var showBox=document.getElementById("showMessage");
	console.log(showBox);
	//兼容IE
	if(window.XMLHttpRequest=="undefined")
	{
		window.XMLHttpRequest=function()
		{
			try{return new ActiveXObject('Msxml2.XMLHTTP.6.0')}
			catch(e1)
			{
				try{return new ActiveXObject('Msxml2.XMLHTTP.3.0')}
				catch(e)
				{
					throw new Error("XMLHttpRequest is not supported");
				}
			}
		}
	}
	
	sendMessage('chatSave.php',messBox,customer);
	showMessage('chat.php?id='+id,showBox);
	


}
//发送消息
function sendMessage(url,mBox,cus)
{	
	mBox.onchange=function()
	{	var data={
			name:cus,
			value:mBox.value
			
		}
		var xml=new XMLHttpRequest();
		xml.open("post",url);

		xml.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		
		xml.send(postMessage(data));
		
		mBox.value="";
	
	}
}
//显示消息
function showMessage(url,box)
{	
	var xml=new XMLHttpRequest();
	xml.open("get",url,true);
	xml.onreadystatechange=function()
	{
		if(xml.readyState==4)
		{
			if(xml.status==200||xml.status==304)
			{	
				var rep=JSON.parse(xml.responseText);
				for(var i=0;i<rep.length;i++)
				{
					styleBox(box,rsp[i]['message'],rsp[i]['customer'],rsp[i]['date']);
					id=rsp[i]['customerId'];//获取消息记录序列号赋值给id;
				}	
				
			}
		}
		setTimeout("showMessage('chat.php?id='+id,box)",1000)//异步调用外面id的值没有改变;在内部超时设置;
	}
	xml.send(null);
}
//消息样式
function styleBox(elt,text,user,time)
{	
	var eltM=document.createElement("span");
	var eltU=document.createElement("span");
	var showT=document.createElement("p");
	var showText=document.createTextNode(time);
	showT.appendChild(showText);
	eltU.textContent=user+":";
	var warner=document.createElement("div");
	var eltT=document.createTextNode(text);
	eltM.setAttribute('class','font');
	warner.appendChild(showT);
	elt.appendChild(warner);
	eltM.appendChild(eltT);
	warner.appendChild(eltM);
	warner.insertBefore(eltU,eltM);

}
//处理数据对象
function postMessage(oValue)
{
	var dates=[];
	if(!oValue)return " ";
	for(var name in oValue)
	{	
		if(!oValue.hasOwnProperty(name))continue;
		if(typeof oValue[name]=='function')continue;
		name=encodeURIComponent(name);
		var value=oValue[name].toString();
		value=encodeURIComponent(value);
		var date=name+"="+value;
		
		dates.push(date);
		
	}
		console.log(dates);
	return dates.join('&');

}
