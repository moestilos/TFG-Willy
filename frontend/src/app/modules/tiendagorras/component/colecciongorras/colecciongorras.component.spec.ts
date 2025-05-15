import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ColecciongorrasComponent } from './colecciongorras.component';

describe('ColecciongorrasComponent', () => {
  let component: ColecciongorrasComponent;
  let fixture: ComponentFixture<ColecciongorrasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ColecciongorrasComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ColecciongorrasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
