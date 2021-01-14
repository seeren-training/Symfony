import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { UserGuard } from './core/guards/user.guard';


const routes: Routes = [
    {
        path: 'users',
        loadChildren: () => import('./users/users.module').then(m => m.UsersModule),
        canActivate: [UserGuard]
    },
    {
        path: 'authorizations',
        loadChildren: () => import('./authorizations/authorizations.module').then(m => m.AuthorizationsModule),
        canActivate: [UserGuard]
    },
    {
        path: '**',
        redirectTo: 'authorizations'
    }
];

@NgModule({
    imports: [
        RouterModule.forRoot(routes)
    ],
    exports: [RouterModule]
})
export class AppRoutingModule {
}
