class Auth{
    user=[];
    userInfo=[];
    token='';

    constructor(){
        this.userData=window.sessionStorage.getItem('user');
        this.userInfoData=window.sessionStorage.getItem('userInfo');
        this.token=window.sessionStorage.getItem('token');
        this.user=this.userData?JSON.parse(this.userData) : null;
        this.userInfo=this.userData?JSON.parse(this.userInfoData) : null;
    }
    login(token,user,userInfo){
        window.sessionStorage.setItem('token',token);
        window.sessionStorage.setItem('user',JSON.stringify(user));
        window.sessionStorage.setItem('userInfo',JSON.stringify(userInfo));
        this.token=token;
        this.user=user;
        this.userInfo = userInfo;
    }
    check(){
        return !!this.token
    }
    logout(){
        window.sessionStorage.removeItem('user');
        window.sessionStorage.removeItem('token');
        window.sessionStorage.removeItem('userInfo');
        this.token='';
        this.user=null;
        this.userInfo = null;
    }
}

export default new Auth();