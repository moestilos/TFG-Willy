import { Component } from '@angular/core';
import { NavComponent } from "../nav/nav.component";

import { FooterComponent } from "../footer/footer.component";
import { ColecciongorrasComponent } from "./component/colecciongorras/colecciongorras.component";

@Component({
  selector: 'app-tiendagorras',
  imports: [NavComponent,  FooterComponent, ColecciongorrasComponent],
  templateUrl: './tiendagorras.component.html',
  styleUrl: './tiendagorras.component.css'
})
export class TiendagorrasComponent {

}
