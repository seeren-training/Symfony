import { Component, OnInit } from '@angular/core';
import { FormGroup } from "@angular/forms";
import { Router } from '@angular/router';

import { Subscription } from "rxjs";

import { AuthorizationsHttpService } from '../shared/services/authorizations-http.service';
import { RegisterFormService } from "./register-form.service";
import { LoadingService } from '../shared/services/loading.service';


@Component({
    selector: 'app-user',
    templateUrl: './register.component.html',
    styleUrls: ['./register.component.scss'],
})
export class RegisterComponent implements OnInit {

    public form: FormGroup;

    public error: string;

    private subscription: Subscription;

    constructor(
        public loadingService: LoadingService,
        private registerFormService: RegisterFormService,
        private authorizationsHttpService: AuthorizationsHttpService,
        private router: Router) {
    }

    ngOnInit(): void {
        this.form = this.registerFormService.get();
    }

    ionViewDidLeave(): void {
        if (this.subscription && !this.subscription.closed) {
            this.subscription.unsubscribe();
        }
        this.form.reset();
        this.error = null;
        this.loadingService.register = false;
    }

    register(): Subscription {
        return this.subscription = this.authorizationsHttpService
            .post(
                this.form.get('email').value,
                this.form.get('password').value
            )
            .subscribe(
                () => this.router.navigate(['/authorizations', 'login']),
                (error: string) => this.error = error
            );
    }

}
