import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HTTP_INTERCEPTORS } from '@angular/common/http';

import { AuthorizationsComponent } from "./authorizations.component";
import { LoginComponent } from "./login/login.component";
import { RegisterComponent } from "./register/register.component";
import { SharedModule } from "../shared/shared.module";
import { AuthorizationsHttpInterceptor } from "./shared/interceptors/authorizations-http.interceptor";
import { AuthorizationsRoutingModule } from './authorizations-routing.module';


@NgModule({
    declarations: [
        AuthorizationsComponent,
        LoginComponent,
        RegisterComponent
    ],
    imports: [
        CommonModule,
        SharedModule,
        AuthorizationsRoutingModule
    ],
    providers: [
        { provide: HTTP_INTERCEPTORS, useClass: AuthorizationsHttpInterceptor, multi: true },
    ]
})
export class AuthorizationsModule { }
