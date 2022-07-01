import Token from './Token'
import AppStorage from './AppStorage'


class User{


    dateformat(date = '') {
        var dates = [];
        if (date == '') {
            var today = new Date();
        } else {
            var today = new Date(date);
        }
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        let hrs = today.getHours()
        let mins = today.getMinutes()
        let secs = today.getSeconds()
        var ampm = hrs >= 12 ? 'pm' : 'am';

        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }

        if(hrs<=9){
            hrs = '0' + hrs

        }
        if(mins<10){

            mins = '0' + mins
        }
        if(secs<10){

            secs = '0' + secs
        }



        today = yyyy + '-' + mm + '-' + dd;
        dates.push(today)
        today = mm + '-' + dd + '-' + yyyy;
        dates.push(today)
        today = mm + '/' + dd + '/' + yyyy;
        dates.push(today)
        today = dd + '-' + mm + '-' + yyyy;
        dates.push(today)
        today = dd + '/' + mm + '/' + yyyy;
        dates.push(today)
        today = yyyy;
        dates.push(today)
        today = yyyy + '-' + mm + '-' + dd + ' '+ hrs+':'+ mins+' '+ampm;
        dates.push(today)
        today = yyyy + '-' + mm + '-' + dd + ' '+ hrs+':'+ mins+':'+secs;
        dates.push(today)
        return dates;
    }


	responseAfterLogin(res){
		const access_token = res.data.access_token
		const username = res.data.name
		if (Token.isValid(access_token)) {
			AppStorage.store(access_token,username)
		}
	}


	hasToken(){
		const storeToken = localStorage.getItem('token');
		if (storeToken) {
			return Token.isValid(storeToken)? true : false
		}
		false
	}

	loggedIn(){
		return this.hasToken()
	}

	name(){
		if (this.loggedIn()) {
			return localStorage.getItem('user');
		}
	}


	id(){
		if (this.loggedIn()) {
			const payload = Token.payload(localStorage.getItem('token'));
			return payload.sub
		}
		return false
	}

}

export default User = new User()
