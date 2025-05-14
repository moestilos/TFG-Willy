import { Component } from '@angular/core';
import { NavComponent } from "../nav/nav.component";
import { HeaderComponent } from "../header/header.component";
import { FooterComponent } from "../footer/footer.component";

@Component({
  selector: 'app-tiendagorras',
  imports: [NavComponent, HeaderComponent, FooterComponent],
  templateUrl: './tiendagorras.component.html',
  styleUrl: './tiendagorras.component.css'
})
export class TiendagorrasComponent {

}
