import Token from "./Token";
import AppStorage from "./AppStorage";

class User {

    storeTokenAfterLogin(res) {
        const access_token = res.data.access_token
        const user = res.data.user
        if(res.data) {
            AppStorage.store(user, access_token);
            window.location = '/dashboard'
        }
    }

    hasToken() {
        const storedToken = AppStorage.getToken();
        if(storedToken) {
            return true
        }

        return false;
    }

    loggedIn() {
        return this.hasToken();
    }

    logout() {
        AppStorage.clear();
        window.location = '/'
    }

    user() {
        if(this.loggedIn()) {
            return AppStorage.getUser();
        }
    }

    id() {
        if(this.loggedIn()) {
            const payload = Token.payload(AppStorage.getToken())
            return payload.sub;
        }
    }
}

export default User = new User();
