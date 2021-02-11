import { Component, OnInit } from '@angular/core';
import { FormGroup } from "@angular/forms";
import { Router } from '@angular/router';

import { Subscription } from "rxjs";

import { LoginFormService } from "./login-form.service";
import { AuthorizationsHttpService } from '../shared/services/authorizations-http.service';
import { LoadingService } from '../shared/services/loading.service';


@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {

    public form: FormGroup;

    public error: string;

    private subscription: Subscription;

    constructor(
        public loadingService: LoadingService,
        private loginFormService: LoginFormService,
        private authorizationHttpService: AuthorizationsHttpService,
        private router: Router) {}

    ngOnInit(): void {
        this.form = this.loginFormService.get();
    }

    ionViewDidLeave(): void {
        if (this.subscription && !this.subscription.closed) {
            this.subscription.unsubscribe();
        }
        this.form.reset();
        this.error = null;
        this.loadingService.login = false;
    }

    login(): Subscription {
        return this.subscription = this.authorizationHttpService
            .get(
                this.form.get('email').value,
                this.form.get('password').value,
            )
            .subscribe(
                () => this.router.navigate(['/users']),
                (error: string) => this.error = error
            );
    }

}
