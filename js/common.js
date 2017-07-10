/**
 * Created by RaHsu on 2017/6/2.
 */
/*常用方法*/
//非空检查
function isEmpty(string) {
    if(string===""){
        return false;
    }
    else{
        return true;
    }
}
//非法字符检查
function isLegal(string){
    var pattern = new RegExp("[`~!@#$^&%*()=|{}':;',\\[\\].<>/?~！ @#￥……&*（）——|{}【】‘；：”“'。，、？]");
    if(pattern.test(string)===true){
        return false;
    }
    else {
        return true;
    }
}
//非法字符及非空检查
function isInput(string) {
    if(isEmpty(string)&&isLegal(string)){
        return true;
    }
    else {
        return false;
    }
}