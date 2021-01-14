import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

import { User } from "../models/user.model";


@Injectable({
    providedIn: 'root'
})
export class UserService {

    private user: User;

    constructor() {
        const user = window.localStorage.getItem(environment.storage.user);
        if (user) {
            this.user = JSON.parse(user);
        }
    }

    has(): boolean {
        return !!this.user;
    }

    get(): User {
        return this.user;
    }

    set(user: User): void {
        const storage = window.localStorage.setItem(
            environment.storage.user,
            JSON.stringify(this.user = user)
        );
    }

}
