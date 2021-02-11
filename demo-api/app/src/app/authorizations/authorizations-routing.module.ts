import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AuthorizationsComponent } from "./authorizations.component";
import { LoginComponent } from "./login/login.component";
import { RegisterComponent } from "./register/register.component";


const routes: Routes = [
    {
        path: '',
        component: AuthorizationsComponent,
        children: [
            {
                path: 'login',
                component: LoginComponent,
                data: {
                    title: 'Login title',
                }
            },
            {
                path: 'register',
                component: RegisterComponent,
                data: {
                    title: 'Register title',
                }
            },
            {
                path: '**',
                redirectTo: 'login'
            }
        ],
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class AuthorizationsRoutingModule { }
