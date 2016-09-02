# height=float(input('请输入您的身高（m）：'))
# weight=float(input('请输入您的体重（Kg）：'))
# s =weight//height**2
# if s<18.5:
#   print('体重过轻')
# elif 18.5<=s<=25:
# 	print('正常')
# elif 25<=s<=28:
# 	print('过重')
# elif 28<=s<=32:
# 	print('肥胖')
# else:
# 	print('严重')
# def power(x, n):
#     s = 1
#     while n > 0:
#         n = n - 1
#         s = s * x
#     return s
L=[]
n=1
while n<=99:
    n=n+1
    L.append(n)
print('L=',L)


half_L=[]
i=0
while i<=len(L)/2-1:
    half_L.append(L[i])
    i=i+1
print('half_L=',half_L)





public function checkcode(){
    $mobile=$_POST['mobile'];
    $code=$_POST['code'];
    var_dump($mobile);//看能不能把用户输入的数据获取到
	$sql="select * from '.$ecs->table(veryficode).' where mobile='.$mobile.'";
    $result=$this->db->query($sql)->row_result();
    var_dump($result);//看能不能从数据拿到数据
    if($result['mobile']==$mobile&&$result['code']==$code){
               //这里写要跳转的页面
    }else{
                //错误提示
    }
}