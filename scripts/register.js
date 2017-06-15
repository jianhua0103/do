$(document).ready(function(){
	$("#commentForm").validate({
		ignore : '',
		errorPlacement : function(error, element) {
			var span = element.next('span');
			if (span.size()) {
				span.html('<em>*</em>' + error.text());
			} else {
				span = $("<span><em>*</em>" + error.text()+ "</span>");
				span.insertAfter(element);
			}
		},
		rules:{
			username:{
				required:true,
				minlength:2
			},
			password:{
				required:true,
				minlength:3,
				maxlength:16
			},
			passwordCheck:{
				required:true,
				minlength:3,
				equalTo:"#password"
			},
			valcode:{formula:"7+9"}
	    },
		
		messages:{
			username:{
				required:"请输入用户名",
				minlength:"请至少输入两个字符"
			},
			password:{
				required:"请输入密码",
				minlength:"密码为3-16个字符",
				maxlength:"密码为3-16个字符"
			},
			passwordCheck:{
				required:"请确认密码",
				equalTo:"两次输入密码不同"
			},
		},
		

	});
	
	$.validator.addMethod(
		"formula",
		function(value,element,param){
			return value == eval(param);
		},
		"请正确输入数学公式计算后的结果:"
	);
	
});
