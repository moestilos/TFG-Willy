import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TiendagorrasComponent } from './tiendagorras.component';

describe('TiendagorrasComponent', () => {
  let component: TiendagorrasComponent;
  let fixture: ComponentFixture<TiendagorrasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TiendagorrasComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TiendagorrasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
