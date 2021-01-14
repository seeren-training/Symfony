import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HTTP_INTERCEPTORS } from '@angular/common/http';

import { SharedModule } from "../shared/shared.module";
import { UsersComponent } from './users.component';
import { UsersHttpInterceptor } from './shared/interceptors/users-http.interceptor';
import { UsersRoutingModule } from './users-routing.module';


@NgModule({
    declarations: [
        UsersComponent,
    ],
    imports: [
        CommonModule,
        SharedModule,
        UsersRoutingModule
    ],
    providers: [
        { provide: HTTP_INTERCEPTORS, useClass: UsersHttpInterceptor, multi: true },
    ]
})
export class UsersModule { }
